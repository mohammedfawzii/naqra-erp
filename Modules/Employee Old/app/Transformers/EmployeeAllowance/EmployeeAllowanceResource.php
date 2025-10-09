<?php

namespace Modules\Employee\Transformers\EmployeeAllowance;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeAllowanceResource
 */
class EmployeeAllowanceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'entitlement_name' => $this->entitlement_name,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
