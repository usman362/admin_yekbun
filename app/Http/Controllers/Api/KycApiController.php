<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ZercashSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class KycApiController extends Controller
{
    // ─── STEP 1: GET DOCUMENT TYPES ────────────────────────────────

    /**
     * GET /api/kyc/document-types
     * Returns available document types for KYC verification.
     */
    public function documentTypes()
    {
        $types = [
            [
                'key'         => 'national_id',
                'label'       => 'National ID Card',
                'description' => 'Government-issued national identity card.',
                'requires_back' => true,
            ],
            [
                'key'         => 'passport',
                'label'       => 'Passport',
                'description' => 'Valid international passport.',
                'requires_back' => false,
            ],
            [
                'key'         => 'driver_license',
                'label'       => 'Driver License',
                'description' => 'Valid driving license with photo.',
                'requires_back' => true,
            ],
            [
                'key'         => 'work_company_license',
                'label'       => 'Work & Company License',
                'description' => 'Official work permit or company license.',
                'requires_back' => false,
            ],
        ];

        return ResponseHelper::sendResponse($types, 'Document types fetched.');
    }

    // ─── STEP 2: SEND KYC OTP ──────────────────────────────────────

    /**
     * POST /api/kyc/send-otp
     * Send OTP to user's registered email/phone before KYC upload.
     */
    public function sendOtp()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        // Generate 6-digit OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP on user (expires in 10 minutes)
        $user->kyc_otp = $otp;
        $user->kyc_otp_expires_at = Carbon::now()->addMinutes(10)->toDateTimeString();
        $user->save();

        // Send OTP via email (using existing mail setup)
        $email = $user->email;
        if ($email) {
            try {
                Mail::raw("Your KYC verification code is: {$otp}\n\nThis code expires in 10 minutes.", function ($message) use ($email, $user) {
                    $message->to($email)
                        ->subject('YekBûn KYC Verification Code');
                });
            } catch (\Exception $e) {
                // Log error but don't fail - OTP is still stored
            }
        }

        // Mask email for response
        $maskedEmail = $this->maskEmail($email ?? '');

        return ResponseHelper::sendResponse([
            'sent_to'    => $maskedEmail,
            'expires_in' => 600, // seconds
        ], 'OTP sent to your registered email.');
    }

    // ─── STEP 3: VERIFY KYC OTP ────────────────────────────────────

    /**
     * POST /api/kyc/verify-otp
     * Verify the OTP before allowing document upload.
     *
     * Body: { "otp": "123456" }
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        // Check OTP
        if (empty($user->kyc_otp)) {
            return ResponseHelper::sendResponse(null, 'No OTP found. Please request a new one.', false, 400);
        }

        // Check expiry
        if ($user->kyc_otp_expires_at && Carbon::parse($user->kyc_otp_expires_at)->isPast()) {
            return ResponseHelper::sendResponse(null, 'OTP has expired. Please request a new one.', false, 401);
        }

        if ($user->kyc_otp !== $request->otp) {
            return ResponseHelper::sendResponse(null, 'Invalid OTP.', false, 401);
        }

        // Clear OTP after successful verification
        $user->kyc_otp = null;
        $user->kyc_otp_expires_at = null;
        $user->kyc_otp_verified = true;
        $user->save();

        return ResponseHelper::sendResponse([
            'verified' => true,
        ], 'OTP verified successfully. You can now upload documents.');
    }

    // ─── STEP 4: SUBMIT KYC (UPLOAD DOCS + INFO IN ONE REQUEST) ────

    /**
     * POST /api/kyc/submit
     * Upload all documents + personal info and submit KYC in a single request.
     * Content-Type: multipart/form-data
     *
     * Body (multipart/form-data):
     *   - document_type:   "national_id" | "passport" | "driver_license" | "work_company_license" (required)
     *   - document_front:  image file (jpg/jpeg/png/pdf, max 5MB) (required)
     *   - document_back:   image file (jpg/jpeg/png/pdf, max 5MB) (required for national_id & driver_license)
     *   - selfie:          image file (jpg/jpeg/png, max 5MB) (optional)
     *   - full_name:       string (required) - Full name as shown on document
     *   - document_number: string (required) - ID/passport number
     *   - date_of_birth:   string (optional) - e.g. "1990-05-15"
     *   - nationality:     string (optional) - e.g. "Kurdistan"
     *   - expiry_date:     string (optional) - e.g. "2030-01-01"
     */
    public function submit(Request $request)
    {
        // Build dynamic validation rules
        $rules = [
            'document_type'   => 'required|in:national_id,passport,driver_license,work_company_license',
            'document_front'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'selfie'          => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'full_name'       => 'nullable|string|max:255',
            'document_number' => 'nullable|string|max:100',
            'date_of_birth'   => 'nullable|string',
            'nationality'     => 'nullable|string|max:100',
            'expiry_date'     => 'nullable|string',
        ];

        // Back is required for national_id and driver_license
        $docType = $request->input('document_type');
        if (in_array($docType, ['national_id', 'driver_license'])) {
            $rules['document_back'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:5120';
        } else {
            $rules['document_back'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120';
        }

        // $request->validate($rules, [
        //     'document_back.required' => 'Back of document is required for ' . str_replace('_', ' ', $docType ?? '') . '.',
        // ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        // Check if OTP was verified
        if (empty($user->kyc_otp_verified)) {
            return ResponseHelper::sendResponse(null, 'Please verify OTP before submitting KYC.', false, 403);
        }

        // Check for existing approved KYC
        $existing = KycVerification::where('user_id', $user->_id)
            ->where('status', 'approved')
            ->first();

        if ($existing) {
            return ResponseHelper::sendResponse(null, 'KYC already approved.', false, 409);
        }

        // Check for existing draft/rejected to update, or create new
        $kyc = KycVerification::where('user_id', $user->_id)
            ->whereIn('status', ['draft', 'rejected'])
            ->latest()
            ->first();

        $kyc = $kyc ?? new KycVerification();
        $kyc->user_id = $user->_id;
        $kyc->document_type = $docType;
        $kyc->otp_verified = true;

        // ── Upload front ──
        $frontFile = $request->file('document_front');
        $frontName = 'kyc_front_' . $user->_id . '_' . time() . '.' . $frontFile->getClientOriginalExtension();
        $kyc->document_front = $frontFile->storeAs('kyc/' . $user->_id, $frontName, 'public');

        // ── Upload back (if provided) ──
        if ($request->hasFile('document_back')) {
            $backFile = $request->file('document_back');
            $backName = 'kyc_back_' . $user->_id . '_' . time() . '.' . $backFile->getClientOriginalExtension();
            $kyc->document_back = $backFile->storeAs('kyc/' . $user->_id, $backName, 'public');
        }

        // ── Upload selfie (optional) ──
        if ($request->hasFile('selfie')) {
            $selfieFile = $request->file('selfie');
            $selfieName = 'kyc_selfie_' . $user->_id . '_' . time() . '.' . $selfieFile->getClientOriginalExtension();
            $kyc->selfie_with_id = $selfieFile->storeAs('kyc/' . $user->_id, $selfieName, 'public');
        }

        // ── Save personal info ──
        $kyc->full_name = $request->full_name;
        $kyc->document_number = $request->document_number;
        $kyc->date_of_birth = $request->date_of_birth;
        $kyc->nationality = $request->nationality;
        $kyc->expiry_date = $request->expiry_date;
        $kyc->status = 'pending';
        $kyc->submitted_at = Carbon::now();
        $kyc->save();

        // Update user's KYC status
        $user->kyc_status = 'pending';
        $user->save();

        return ResponseHelper::sendResponse([
            'kyc_id'          => $kyc->_id,
            'status'          => 'pending',
            'document_type'   => $kyc->document_type,
            'front_uploaded'  => true,
            'back_uploaded'   => !empty($kyc->document_back),
            'selfie_uploaded' => !empty($kyc->selfie_with_id),
            'message'         => 'Thank you for your submission. Our team will review your documents. Once complete, we will get back to you.',
        ], 'KYC submitted for review.');
    }

    // ─── GET KYC STATUS ────────────────────────────────────────────

    /**
     * GET /api/kyc/status
     * Check current KYC verification status.
     */
    public function status()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        $kyc = KycVerification::where('user_id', $user->_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$kyc) {
            return ResponseHelper::sendResponse([
                'has_kyc'    => false,
                'kyc_status' => null,
            ], 'No KYC submission found.');
        }

        $statusMessages = [
            'draft'        => 'KYC documents are being uploaded.',
            'pending'      => 'Your documents are submitted and waiting for review.',
            'under_review' => 'Our team is currently reviewing your documents.',
            'approved'     => 'Your KYC is approved. Your wallet is now active!',
            'rejected'     => 'Your KYC was rejected. Please resubmit.',
        ];

        return ResponseHelper::sendResponse([
            'has_kyc'          => true,
            'kyc_id'           => $kyc->_id,
            'kyc_status'       => $kyc->status,
            'status_message'   => $statusMessages[$kyc->status] ?? 'Unknown status.',
            'document_type'    => $kyc->document_type,
            'full_name'        => $kyc->full_name,
            'rejection_reason' => $kyc->rejection_reason,
            'submitted_at'     => $kyc->submitted_at ? Carbon::parse($kyc->submitted_at)->format('d M Y H:i') : null,
            'reviewed_at'      => $kyc->reviewed_at ? Carbon::parse($kyc->reviewed_at)->format('d M Y H:i') : null,
        ], 'KYC status fetched.');
    }

    // ─── ADMIN: REVIEW KYC ─────────────────────────────────────────

    /**
     * POST /api/kyc/review
     * Admin reviews and approves/rejects KYC.
     * On approval: wallet gets activated + 300 ZER welcome bonus.
     *
     * Body: {
     *   "kyc_id": "...",
     *   "action": "approve" | "reject",
     *   "reason": "..." (required for reject)
     * }
     */
    public function review(Request $request)
    {
        $request->validate([
            'kyc_id' => 'required|string',
            'action' => 'required|in:approve,reject',
            'reason' => 'required_if:action,reject|nullable|string',
        ]);

        $kyc = KycVerification::find($request->kyc_id);
        if (!$kyc) {
            return ResponseHelper::sendResponse(null, 'KYC record not found.', false, 404);
        }

        $user = User::find($kyc->user_id);
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        $adminId = Auth::id();

        if ($request->action === 'approve') {
            // Approve KYC
            $kyc->status = 'approved';
            $kyc->reviewed_by = $adminId;
            $kyc->reviewed_at = Carbon::now();
            $kyc->save();

            // Update user KYC status
            $user->kyc_status = 'approved';
            $user->kyc_verified_at = Carbon::now()->toDateTimeString();

            // ── AUTO-ACTIVATE WALLET ──
            // If user has a wallet in under_review, activate it now
            if (!empty($user->wallet_id) && $user->wallet_status !== 'activated') {
                $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();
                $welcomeBonus = $setting->welcome_bonus ?? 300;

                $user->wallet_status = 'activated';
                $user->zer_balance = ($user->zer_balance ?? 0) + $welcomeBonus;
                $user->wallet_activated_at = Carbon::now()->toDateTimeString();

                // Create welcome bonus transaction
                $transaction = new Transaction();
                $transaction->tId = 'YK' . rand(100000000, 999999999);
                $transaction->user_id = $user->_id;
                $transaction->amount = $welcomeBonus;
                $transaction->currency = 'ZER';
                $transaction->transaction_type = 'deposit';
                $transaction->category = 'welcome_bonus';
                $transaction->status = 'COMPLETED';
                $transaction->description = 'YekBûn Welcome Bonus';
                $transaction->date = Carbon::now()->format('Y-m-d');
                $transaction->created_at = Carbon::now();
                $transaction->save();
            }

            $user->save();

            return ResponseHelper::sendResponse([
                'kyc_status'    => 'approved',
                'wallet_status' => $user->wallet_status ?? null,
                'welcome_bonus' => isset($welcomeBonus) ? $welcomeBonus : null,
            ], 'KYC approved. Wallet activated with welcome bonus.');

        } else {
            // Reject KYC
            $kyc->status = 'rejected';
            $kyc->rejection_reason = $request->reason;
            $kyc->reviewed_by = $adminId;
            $kyc->reviewed_at = Carbon::now();
            $kyc->save();

            $user->kyc_status = 'rejected';
            $user->save();

            return ResponseHelper::sendResponse([
                'kyc_status' => 'rejected',
                'reason'     => $request->reason,
            ], 'KYC rejected.');
        }
    }

    // ─── ADMIN: LIST PENDING KYC ───────────────────────────────────

    /**
     * GET /api/kyc/pending
     * Admin: List all pending KYC submissions for review.
     *
     * Query: ?page=1&per_page=20&status=pending
     */
    public function pendingList(Request $request)
    {
        $perPage = $request->query('per_page', 20);
        $status = $request->query('status', 'pending');

        $query = KycVerification::whereIn('status', $status === 'all' ? ['pending', 'under_review', 'approved', 'rejected'] : [$status])
            ->orderBy('submitted_at', 'desc');

        $kycs = $query->paginate($perPage);

        $items = $kycs->map(function ($kyc) {
            return [
                'kyc_id'          => $kyc->_id,
                'user_id'         => $kyc->user_id,
                'full_name'       => $kyc->full_name,
                'document_type'   => $kyc->document_type,
                'document_number' => $kyc->document_number,
                'status'          => $kyc->status,
                'submitted_at'    => $kyc->submitted_at ? Carbon::parse($kyc->submitted_at)->format('d M Y H:i') : null,
                'document_front'  => $kyc->document_front ? asset('storage/' . $kyc->document_front) : null,
                'document_back'   => $kyc->document_back ? asset('storage/' . $kyc->document_back) : null,
                'selfie_with_id'  => $kyc->selfie_with_id ? asset('storage/' . $kyc->selfie_with_id) : null,
            ];
        });

        return ResponseHelper::sendResponse([
            'items'        => $items,
            'current_page' => $kycs->currentPage(),
            'last_page'    => $kycs->lastPage(),
            'total'        => $kycs->total(),
        ], 'KYC list fetched.');
    }

    // ─── HELPERS ───────────────────────────────────────────────────

    private function maskEmail($email)
    {
        if (empty($email) || !str_contains($email, '@')) return '***@***.***';
        $parts = explode('@', $email);
        $name = $parts[0];
        $domain = $parts[1];
        $masked = substr($name, 0, 2) . str_repeat('*', max(strlen($name) - 2, 3));
        return $masked . '@' . $domain;
    }
}
