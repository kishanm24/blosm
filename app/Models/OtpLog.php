<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id',
        'otp',
        'attempt_count',
        'last_attempt_at',
    ];

    protected $casts = [
        'last_attempt_at' => 'datetime',
        // Add more attributes as needed
    ];

    // Define the relationship with the User model if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
