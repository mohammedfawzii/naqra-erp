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
            return $this->mergeWithTimestamps([
            'employee_id' => $this->employee_id,
            'entitlement_name' => $this->entitlement_name,
            'amount' => $this->amount,
            'note' => $this->note,
           
        ]);
    }
}
