<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ZercashSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WalletApiController extends Controller
{
    // ─── WALLET CREATION & PIN SETUP ───────────────────────────────

    /**
     * POST /api/wallet/create
     * First-time wallet creation with PIN setup.
     * Creates wallet, sets PIN, assigns wallet ID, gives 300 ZER welcome bonus.
     *
     * Body: { "pin": "1234" }  (4-digit PIN)
     */
    public function createWallet(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|size:4|regex:/^[0-9]{4}$/',
        ]);

        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        // Check if wallet already exists
        if (!empty($user->wallet_id)) {
            return ResponseHelper::sendResponse(null, 'Wallet already exists.', false, 409);
        }

        // Generate unique wallet ID: KU-RA XXXX XXXX XXXX (16-char format)
        $walletId = $this->generateWalletId();

        // Set wallet fields
        $user->wallet_id = $walletId;
        $user->wallet_pin = Hash::make($request->pin);
        $user->wallet_status = 'under_review'; // Initial status: under_review
        $user->wallet_balance = 0;
        $user->zer_balance = 0;
        $user->wallet_created_at = Carbon::now()->toDateTimeString();
        $user->wallet_expire_at = Carbon::now()->addYears(5)->format('m/y');
        $user->save();

        return ResponseHelper::sendResponse([
            'wallet_id'     => $this->maskWalletId($walletId),
            'wallet_status' => 'under_review',
            'message'       => 'Wallet created successfully. It is now under review.',
        ], 'Wallet created successfully.');
    }

    /**
     * POST /api/wallet/activate
     * Admin or system activates a wallet after review.
     * Gives 300 ZER welcome bonus on first activation.
     *
     * Body: { "user_id": "..." }  (Admin only)
     */
    public function activateWallet(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
        ]);

        $user = User::find($request->user_id);
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if (empty($user->wallet_id)) {
            return ResponseHelper::sendResponse(null, 'No wallet found for this user.', false, 404);
        }

        if ($user->wallet_status === 'activated') {
            return ResponseHelper::sendResponse(null, 'Wallet is already activated.', false, 409);
        }

        // Fetch welcome bonus amount from settings (default 300)
        $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();
        $welcomeBonus = $setting->welcome_bonus ?? 300;

        // Activate wallet and credit welcome bonus
        $user->wallet_status = 'activated';
        $user->zer_balance = ($user->zer_balance ?? 0) + $welcomeBonus;
        $user->wallet_activated_at = Carbon::now()->toDateTimeString();
        $user->save();

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

        return ResponseHelper::sendResponse([
            'wallet_status'  => 'activated',
            'welcome_bonus'  => $welcomeBonus,
            'zer_balance'    => $user->zer_balance,
            'transaction_id' => $transaction->tId,
        ], 'Wallet activated with ' . $welcomeBonus . ' ZER welcome bonus.');
    }

    /**
     * POST /api/wallet/verify-pin
     * Verify wallet PIN for sensitive operations.
     *
     * Body: { "pin": "1234" }
     */
    public function verifyPin(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|size:4',
        ]);

        $user = User::find(Auth::id());
        if (!$user || empty($user->wallet_pin)) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        if (!Hash::check($request->pin, $user->wallet_pin)) {
            return ResponseHelper::sendResponse(null, 'Invalid PIN.', false, 401);
        }

        return ResponseHelper::sendResponse([
            'verified' => true,
        ], 'PIN verified successfully.');
    }

    /**
     * POST /api/wallet/change-pin
     * Change wallet PIN.
     *
     * Body: { "current_pin": "1234", "new_pin": "5678" }
     */
    public function changePin(Request $request)
    {
        $request->validate([
            'current_pin' => 'required|string|size:4',
            'new_pin'     => 'required|string|size:4|regex:/^[0-9]{4}$/',
        ]);

        $user = User::find(Auth::id());
        if (!$user || empty($user->wallet_pin)) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        if (!Hash::check($request->current_pin, $user->wallet_pin)) {
            return ResponseHelper::sendResponse(null, 'Current PIN is incorrect.', false, 401);
        }

        $user->wallet_pin = Hash::make($request->new_pin);
        $user->save();

        return ResponseHelper::sendResponse(null, 'PIN changed successfully.');
    }

    // ─── WALLET STATUS MANAGEMENT ──────────────────────────────────

    /**
     * GET /api/wallet/status
     * Get wallet status and basic info.
     *
     * Returns: wallet_id, status, created_at, expire_at
     */
    public function walletStatus()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if (empty($user->wallet_id)) {
            return ResponseHelper::sendResponse([
                'has_wallet' => false,
            ], 'No wallet found. Please create one.');
        }

        $statusMessages = [
            'under_review' => 'We will review your request. We will get back soon.',
            'activated'    => 'Wallet is activated. Enjoy...',
            'on_hold'      => 'Wallet is on Hold. See the reason here.',
            'closed'       => 'Wallet is Closed. The account will be removed after 90 Days.',
        ];

        $status = $user->wallet_status ?? 'under_review';

        return ResponseHelper::sendResponse([
            'has_wallet'    => true,
            'wallet_id'     => $this->maskWalletId($user->wallet_id),
            'wallet_status' => $status,
            'status_message'=> $statusMessages[$status] ?? 'Unknown status.',
            'hold_reason'   => $user->wallet_hold_reason ?? null,
            'expire_at'     => $user->wallet_expire_at ?? null,
            'created_at'    => $user->wallet_created_at ?? null,
        ], 'Wallet status fetched.');
    }

    /**
     * POST /api/wallet/update-status  (Admin endpoint)
     * Update wallet status: under_review, activated, on_hold, closed
     *
     * Body: { "user_id": "...", "status": "on_hold", "reason": "..." }
     */
    public function updateWalletStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'status'  => 'required|in:under_review,activated,on_hold,closed',
            'reason'  => 'nullable|string',
        ]);

        $user = User::find($request->user_id);
        if (!$user || empty($user->wallet_id)) {
            return ResponseHelper::sendResponse(null, 'Wallet not found.', false, 404);
        }

        $user->wallet_status = $request->status;

        if ($request->status === 'on_hold') {
            $user->wallet_hold_reason = $request->reason ?? 'Account under investigation.';
        }

        if ($request->status === 'closed') {
            $user->wallet_closed_at = Carbon::now()->toDateTimeString();
        }

        // If activating for the first time, give welcome bonus
        if ($request->status === 'activated' && empty($user->wallet_activated_at)) {
            $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();
            $welcomeBonus = $setting->welcome_bonus ?? 300;
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
            'wallet_status' => $user->wallet_status,
        ], 'Wallet status updated to ' . $request->status . '.');
    }

    // ─── WALLET DASHBOARD (HOME SCREEN) ────────────────────────────

    /**
     * GET /api/wallet/dashboard
     * Full wallet dashboard data for mobile home screen.
     * Includes balance, wallet ID, deposits, cashbacks, expenses, weekly chart.
     *
     * Query: ?type=private|business  (default: private)
     */
    public function dashboard(Request $request)
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        if (empty($user->wallet_id) || ($user->wallet_status ?? '') !== 'activated') {
            return ResponseHelper::sendResponse([
                'has_wallet'    => !empty($user->wallet_id),
                'wallet_status' => $user->wallet_status ?? null,
            ], 'Wallet not active.', false, 403);
        }

        $walletType = $request->query('type', 'private'); // private or business

        // Fetch settings for exchange rates
        $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();
        $cashbackPercent = $setting->transaction_fee_percent ?? 5;
        $currency = $setting->default_currency ?? 'EUR';

        // Calculate totals from transactions
        $userId = Auth::id();
        $deposits = Transaction::where('user_id', $userId)
            ->where('transaction_type', 'deposit')
            ->where('status', 'COMPLETED')
            ->sum('amount');

        $cashbacks = Transaction::where('user_id', $userId)
            ->where('category', 'cashback')
            ->where('status', 'COMPLETED')
            ->sum('amount');

        $expenses = Transaction::where('user_id', $userId)
            ->whereIn('transaction_type', ['purchase', 'payment', 'expense'])
            ->where('status', 'COMPLETED')
            ->sum('amount');

        // Weekly chart data (last 7 days)
        $weeklyData = [];
        $dayLabels = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dayTotal = Transaction::where('user_id', $userId)
                ->where('status', 'COMPLETED')
                ->where('date', $date->format('Y-m-d'))
                ->sum('amount');

            $weeklyData[] = [
                'day'    => $dayLabels[$date->dayOfWeek],
                'date'   => $date->format('Y-m-d'),
                'amount' => round($dayTotal, 2),
                'is_today' => $i === 0,
            ];
        }

        return ResponseHelper::sendResponse([
            'wallet_id'        => $this->maskWalletId($user->wallet_id),
            'wallet_type'      => $walletType,
            'expire_at'        => $user->wallet_expire_at ?? null,
            'balance'          => round($user->wallet_balance ?? 0, 2),
            'zer_balance'      => round($user->zer_balance ?? 0, 2),
            'cashback_percent' => $cashbackPercent,
            'currency'         => $currency,
            'summary'          => [
                'deposits'  => round($deposits, 2),
                'cashbacks' => round($cashbacks, 2),
                'expenses'  => round($expenses, 2),
            ],
            'weekly_chart'     => $weeklyData,
        ], 'Wallet dashboard fetched.');
    }

    // ─── DEPOSITS ──────────────────────────────────────────────────

    /**
     * GET /api/wallet/deposits
     * List user's deposit transactions.
     *
     * Query: ?page=1&per_page=10
     */
    public function deposits(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        $deposits = Transaction::where('user_id', Auth::id())
            ->where('transaction_type', 'deposit')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $items = $deposits->map(function ($tx) {
            return [
                'id'          => $tx->_id,
                'tId'         => $tx->tId ?? '',
                'description' => $tx->description ?? 'Deposit',
                'category'    => $tx->category ?? 'deposit',
                'amount'      => round($tx->amount ?? 0, 2),
                'currency'    => $tx->currency ?? 'ZER',
                'status'      => $tx->status ?? 'COMPLETED',
                'type'        => 'INCOME',
                'date'        => $tx->date ?? ($tx->created_at ? Carbon::parse($tx->created_at)->format('d M Y') : ''),
            ];
        });

        return ResponseHelper::sendResponse([
            'items'        => $items,
            'current_page' => $deposits->currentPage(),
            'last_page'    => $deposits->lastPage(),
            'total'        => $deposits->total(),
        ], 'Deposits fetched.');
    }

    // ─── CASHBACKS ─────────────────────────────────────────────────

    /**
     * GET /api/wallet/cashbacks
     * List user's cashback transactions.
     *
     * Query: ?page=1&per_page=10
     */
    public function cashbacks(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        $cashbacks = Transaction::where('user_id', Auth::id())
            ->where('category', 'cashback')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $items = $cashbacks->map(function ($tx) {
            return [
                'id'          => $tx->_id,
                'tId'         => $tx->tId ?? '',
                'description' => $tx->description ?? 'Cashback',
                'shop_name'   => $tx->shop_name ?? $tx->description ?? '',
                'amount'      => round($tx->amount ?? 0, 2),
                'currency'    => $tx->currency ?? 'ZER',
                'status'      => $tx->status ?? 'PENDING', // PENDING, COMPLETED, FAILED
                'date'        => $tx->date ?? ($tx->created_at ? Carbon::parse($tx->created_at)->format('d M Y') : ''),
            ];
        });

        return ResponseHelper::sendResponse([
            'items'        => $items,
            'current_page' => $cashbacks->currentPage(),
            'last_page'    => $cashbacks->lastPage(),
            'total'        => $cashbacks->total(),
        ], 'Cashbacks fetched.');
    }

    // ─── PAYOUTS / EXPENSES ────────────────────────────────────────

    /**
     * GET /api/wallet/payouts
     * List user's payout/expense transactions.
     *
     * Query: ?page=1&per_page=10
     */
    public function payouts(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        $payouts = Transaction::where('user_id', Auth::id())
            ->whereIn('transaction_type', ['purchase', 'payment', 'payout', 'expense'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $items = $payouts->map(function ($tx) {
            return [
                'id'          => $tx->_id,
                'tId'         => $tx->tId ?? '',
                'description' => $tx->description ?? 'Payment',
                'shop_name'   => $tx->shop_name ?? '',
                'amount'      => round($tx->amount ?? 0, 2),
                'currency'    => $tx->currency ?? 'ZER',
                'status'      => $tx->status ?? 'COMPLETED', // IN_CART, COMPLETED, PENDING
                'date'        => $tx->date ?? ($tx->created_at ? Carbon::parse($tx->created_at)->format('d M Y') : ''),
            ];
        });

        return ResponseHelper::sendResponse([
            'items'        => $items,
            'current_page' => $payouts->currentPage(),
            'last_page'    => $payouts->lastPage(),
            'total'        => $payouts->total(),
        ], 'Payouts fetched.');
    }

    // ─── ALL TRANSACTIONS (COMBINED) ───────────────────────────────

    /**
     * GET /api/wallet/transactions
     * All transactions with filters.
     *
     * Query: ?type=deposit|cashback|purchase|all  &status=COMPLETED|PENDING|FAILED  &page=1&per_page=20
     */
    public function transactions(Request $request)
    {
        $perPage = $request->query('per_page', 20);
        $type = $request->query('type', 'all');
        $status = $request->query('status');

        $query = Transaction::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');

        if ($type !== 'all') {
            if ($type === 'cashback') {
                $query->where('category', 'cashback');
            } else {
                $query->where('transaction_type', $type);
            }
        }

        if ($status) {
            $query->where('status', $status);
        }

        $transactions = $query->paginate($perPage);

        $items = $transactions->map(function ($tx) {
            $txType = $tx->transaction_type ?? 'other';
            $isIncome = in_array($txType, ['deposit', 'refund']) || ($tx->category ?? '') === 'welcome_bonus';

            return [
                'id'               => $tx->_id,
                'tId'              => $tx->tId ?? '',
                'description'      => $tx->description ?? ucfirst($txType),
                'transaction_type' => $txType,
                'category'         => $tx->category ?? $txType,
                'amount'           => round($tx->amount ?? 0, 2),
                'currency'         => $tx->currency ?? 'ZER',
                'status'           => $tx->status ?? 'PENDING',
                'type'             => $isIncome ? 'INCOME' : 'EXPENSE',
                'shop_name'        => $tx->shop_name ?? null,
                'date'             => $tx->date ?? ($tx->created_at ? Carbon::parse($tx->created_at)->format('d M Y') : ''),
            ];
        });

        return ResponseHelper::sendResponse([
            'items'        => $items,
            'current_page' => $transactions->currentPage(),
            'last_page'    => $transactions->lastPage(),
            'total'        => $transactions->total(),
        ], 'Transactions fetched.');
    }

    // ─── DEPOSIT / TOP-UP WALLET ───────────────────────────────────

    /**
     * POST /api/wallet/deposit
     * Add funds to wallet (Zêrcash Charging).
     *
     * Body: { "amount": 500, "payment_method": "card", "description": "Zêrcash Charging" }
     */
    public function deposit(Request $request)
    {
        $request->validate([
            'amount'         => 'required|numeric|min:1',
            'payment_method' => 'required|in:card,paypal,bank',
            'description'    => 'nullable|string',
        ]);

        $user = User::find(Auth::id());
        if (!$user || ($user->wallet_status ?? '') !== 'activated') {
            return ResponseHelper::sendResponse(null, 'Wallet is not active.', false, 403);
        }

        $amount = round($request->amount, 2);

        // Credit the wallet
        $user->zer_balance = ($user->zer_balance ?? 0) + $amount;
        $user->save();

        // Create deposit transaction
        $transaction = new Transaction();
        $transaction->tId = 'YK' . rand(100000000, 999999999);
        $transaction->user_id = $user->_id;
        $transaction->amount = $amount;
        $transaction->currency = 'ZER';
        $transaction->transaction_type = 'deposit';
        $transaction->category = 'charging';
        $transaction->payment_method = $request->payment_method;
        $transaction->status = 'COMPLETED';
        $transaction->description = $request->description ?? 'Zêrcash Charging';
        $transaction->date = Carbon::now()->format('Y-m-d');
        $transaction->created_at = Carbon::now();
        $transaction->save();

        return ResponseHelper::sendResponse([
            'transaction_id' => $transaction->tId,
            'amount'         => $amount,
            'new_balance'    => round($user->zer_balance, 2),
        ], 'Deposit successful.');
    }

    // ─── QUICK ACCESS DASHBOARD ────────────────────────────────────

    /**
     * GET /api/wallet/quick-access
     * Quick access dashboard data for mobile app.
     * Returns wallet info, channel stats, shop stats.
     */
    public function quickAccess()
    {
        $user = User::find(Auth::id());
        if (!$user) {
            return ResponseHelper::sendResponse(null, 'User not found.', false, 404);
        }

        // Wallet info
        $walletInfo = [
            'has_wallet'    => !empty($user->wallet_id),
            'wallet_id'     => $user->wallet_id ? $this->maskWalletId($user->wallet_id) : null,
            'wallet_status' => $user->wallet_status ?? null,
            'balance'       => round($user->wallet_balance ?? 0, 2),
            'zer_balance'   => round($user->zer_balance ?? 0, 2),
        ];

        // Open Terminal, Transactions count, Zer Status
        $transactionsCount = Transaction::where('user_id', $user->_id)->count();
        $depositChange = 0; // Percentage change - calculate if needed
        $expenseChange = 0;

        $terminalStats = [
            'open_terminal'  => 0,
            'transactions'   => $transactionsCount,
            'deposit_change' => $depositChange . '%',
            'expense_change' => $expenseChange . '%',
            'zer_status'     => round($user->zer_balance ?? 0, 2),
        ];

        // Channel info (if user has a channel)
        $channelInfo = [
            'has_channel'   => !empty($user->channel_name),
            'channel_name'  => $user->channel_name ?? null,
            'channel_id'    => $user->channel_id ?? null,
            'member_since'  => $user->created_at ? Carbon::parse($user->created_at)->format('d-m-Y') : null,
            'channel_status'=> $user->channel_status ?? 'activated',
            'status_message'=> $user->channel_status_message ?? 'We wish good luck here',
            'followers'     => $user->followers_count ?? 0,
            'members'       => $user->members_count ?? 0,
            'feeds'         => $user->feeds_count ?? 0,
            'follower_change' => '+25%',
            'member_change'   => '+25%',
            'feed_change'     => '+25%',
        ];

        // Shop info (if user has a shop)
        $shopInfo = [
            'has_shop'      => !empty($user->shop_name),
            'shop_name'     => $user->shop_name ?? null,
            'shop_id'       => $user->shop_id ?? null,
            'member_since'  => $user->shop_created_at ?? ($user->created_at ? Carbon::parse($user->created_at)->format('d-m-Y') : null),
            'shop_status'   => $user->shop_status ?? 'activated',
            'status_message'=> $user->shop_status_message ?? 'We wish good luck here',
            'followers'     => $user->shop_followers_count ?? 0,
            'reviews'       => $user->shop_reviews_count ?? 0,
            'offers'        => $user->shop_offers_count ?? 0,
            'follower_change' => '+25%',
            'review_change'   => '+25%',
            'offer_change'    => '+25%',
        ];

        return ResponseHelper::sendResponse([
            'wallet'   => $walletInfo,
            'terminal' => $terminalStats,
            'channel'  => $channelInfo,
            'shop'     => $shopInfo,
        ], 'Quick access data fetched.');
    }

    // ─── WALLET CHART DATA ─────────────────────────────────────────

    /**
     * GET /api/wallet/chart
     * Chart data for wallet balance over time.
     *
     * Query: ?period=week|month|year  (default: week)
     */
    public function chartData(Request $request)
    {
        $period = $request->query('period', 'week');
        $userId = Auth::id();

        $data = [];

        switch ($period) {
            case 'month':
                // Last 30 days, grouped by day
                for ($i = 29; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $income = Transaction::where('user_id', $userId)
                        ->where('transaction_type', 'deposit')
                        ->where('status', 'COMPLETED')
                        ->where('date', $date->format('Y-m-d'))
                        ->sum('amount');
                    $expense = Transaction::where('user_id', $userId)
                        ->whereIn('transaction_type', ['purchase', 'payment', 'expense'])
                        ->where('status', 'COMPLETED')
                        ->where('date', $date->format('Y-m-d'))
                        ->sum('amount');

                    $data[] = [
                        'label'   => $date->format('d'),
                        'date'    => $date->format('Y-m-d'),
                        'income'  => round($income, 2),
                        'expense' => round($expense, 2),
                        'net'     => round($income - $expense, 2),
                    ];
                }
                break;

            case 'year':
                // Last 12 months
                for ($i = 11; $i >= 0; $i--) {
                    $month = Carbon::now()->subMonths($i);
                    $start = $month->copy()->startOfMonth()->format('Y-m-d');
                    $end = $month->copy()->endOfMonth()->format('Y-m-d');

                    $income = Transaction::where('user_id', $userId)
                        ->where('transaction_type', 'deposit')
                        ->where('status', 'COMPLETED')
                        ->whereBetween('date', [$start, $end])
                        ->sum('amount');
                    $expense = Transaction::where('user_id', $userId)
                        ->whereIn('transaction_type', ['purchase', 'payment', 'expense'])
                        ->where('status', 'COMPLETED')
                        ->whereBetween('date', [$start, $end])
                        ->sum('amount');

                    $data[] = [
                        'label'   => $month->format('M'),
                        'date'    => $month->format('Y-m'),
                        'income'  => round($income, 2),
                        'expense' => round($expense, 2),
                        'net'     => round($income - $expense, 2),
                    ];
                }
                break;

            default: // week
                $dayLabels = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
                for ($i = 6; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $income = Transaction::where('user_id', $userId)
                        ->where('transaction_type', 'deposit')
                        ->where('status', 'COMPLETED')
                        ->where('date', $date->format('Y-m-d'))
                        ->sum('amount');
                    $expense = Transaction::where('user_id', $userId)
                        ->whereIn('transaction_type', ['purchase', 'payment', 'expense'])
                        ->where('status', 'COMPLETED')
                        ->where('date', $date->format('Y-m-d'))
                        ->sum('amount');

                    $data[] = [
                        'label'    => $dayLabels[$date->dayOfWeek],
                        'date'     => $date->format('Y-m-d'),
                        'income'   => round($income, 2),
                        'expense'  => round($expense, 2),
                        'net'      => round($income - $expense, 2),
                        'is_today' => $i === 0,
                    ];
                }
                break;
        }

        return ResponseHelper::sendResponse([
            'period' => $period,
            'data'   => $data,
        ], 'Chart data fetched.');
    }

    // ─── HELPERS ───────────────────────────────────────────────────

    /**
     * Generate a unique wallet ID in format: KU-RA XXXX XXXX XXXX
     */
    private function generateWalletId()
    {
        do {
            $id = 'KURA' . strtoupper(Str::random(12));
            // Format: KU-RA XXXX XXXX XXXX
            $formatted = 'KU-RA ' . substr($id, 4, 4) . ' ' . substr($id, 8, 4) . ' ' . substr($id, 12, 4);
        } while (User::where('wallet_id', $formatted)->exists());

        return $formatted;
    }

    /**
     * Mask wallet ID: KU-RA **** **** XXXX (show only last 4)
     */
    private function maskWalletId($walletId)
    {
        if (strlen($walletId) < 10) return $walletId;
        $parts = explode(' ', $walletId);
        if (count($parts) >= 4) {
            return $parts[0] . ' **** **** ' . $parts[3];
        }
        return $walletId;
    }
}
