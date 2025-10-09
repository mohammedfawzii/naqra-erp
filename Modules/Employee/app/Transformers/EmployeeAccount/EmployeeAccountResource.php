<?php

namespace Modules\Employee\Transformers\EmployeeAccount;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeAccountResource
 */
class EmployeeAccountResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                   return $this->mergeWithTimestamps([

            'email' => $this->email,
            'password' => $this->password,
            'approved' => $this->approved,
            'send_login_email' => $this->send_login_email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
    }
}
