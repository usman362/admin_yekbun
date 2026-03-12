<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class KycVerification extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kyc_verifications';

    protected $fillable = [
        'user_id',
        'document_type',        // national_id, passport, driver_license, work_company_license
        'document_front',       // File path to front image
        'document_back',        // File path to back image
        'selfie_with_id',       // File path to selfie holding ID
        'full_name',            // Name as on document
        'document_number',      // ID/Passport number
        'date_of_birth',        // DOB from document
        'nationality',          // Nationality
        'expiry_date',          // Document expiry
        'status',               // pending, under_review, approved, rejected
        'rejection_reason',     // If rejected
        'reviewed_by',          // Admin user ID who reviewed
        'reviewed_at',          // Timestamp of review
        'otp_verified',         // Boolean - OTP verified before upload
        'submitted_at',         // When user submitted
        'notes',                // Admin notes
    ];

    protected $casts = [
        'otp_verified' => 'boolean',
        'submitted_at' => 'datetime',
        'reviewed_at'  => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
