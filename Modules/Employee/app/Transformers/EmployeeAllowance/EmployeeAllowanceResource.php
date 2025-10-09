<?php

namespace Modules\Employee\Transformers\EmployeeAllowance;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeAllowanceResource
 */
class EmployeeAllowanceResource extends BaseMetaResource
{
    public function toArray($request): array
    {
            return $this->mergeWithTimestamps([
            'employee_id' => $this->employee_id,
            'entitlement_name' => $this->entitlement_name,
            'amount' => $this->amount,
    
        ]);
    }
}
