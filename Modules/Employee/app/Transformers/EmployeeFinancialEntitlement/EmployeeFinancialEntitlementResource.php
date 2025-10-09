<?php

namespace Modules\Employee\Transformers\EmployeeFinancialEntitlement;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeFinancialEntitlementResource
 */
class EmployeeFinancialEntitlementResource extends BaseMetaResource
{
    public function toArray($request): array
    {
            return $this->mergeWithTimestamps([
            'employee_id' => $this->employee_id,
            'basic_salary' => $this->basic_salary,
            'salary_type_id' => $this->salary_type_id,
            'currency_id' => $this->currency_id,
            'iban' => $this->iban,
            'cost_center' => $this->cost_center,
            'salary_payment_method' => $this->salary_payment_method,
            'bank_id' => $this->bank_id,
         
        ]);
    }
}
