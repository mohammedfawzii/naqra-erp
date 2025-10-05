<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTwoFactor extends Model
{
    protected $guarded;
      protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
}
