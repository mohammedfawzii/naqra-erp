<?php

namespace Modules\Employee\Transformers\EmployeeOtherEntitlement;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeOtherEntitlementResource
 */
class EmployeeOtherEntitlementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'entitlement_name' => $this->entitlement_name,
            'amount' => $this->amount,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
