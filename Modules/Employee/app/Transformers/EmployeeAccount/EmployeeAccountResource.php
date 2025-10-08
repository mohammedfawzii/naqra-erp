<?php

namespace Modules\Employee\Transformers\EmployeeAccount;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeAccountResource
 */
class EmployeeAccountResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'approved' => $this->approved,
            'send_login_email' => $this->send_login_email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
