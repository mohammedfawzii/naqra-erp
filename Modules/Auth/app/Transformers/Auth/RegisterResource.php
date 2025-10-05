<?php

namespace Modules\Auth\Transformers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => (string) $this->id,
            'userName' => $this->userName,
            'fullName' => $this->fullName,
            'email' => $this->email,
            'phone' => $this->phone,
             'is_verified' => (bool) $this->is_verified,
            'two_factor' =>[
            'email_otp'  => $this->two_factor['email_otp'] ?? null,
            'sms_otp'    => $this->two_factor['sms_otp'] ?? null,
            'app_secret' => $this->two_factor['app_secret'] ?? null,
            ],

  
        ];
    }
}
