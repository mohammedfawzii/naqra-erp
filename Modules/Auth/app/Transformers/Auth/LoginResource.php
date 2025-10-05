<?php

namespace Modules\Auth\Transformers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'is_fully_verified' => (bool) $this->is_fully_verified,
             'token' => $this->token,
            
        ];
    }
}
