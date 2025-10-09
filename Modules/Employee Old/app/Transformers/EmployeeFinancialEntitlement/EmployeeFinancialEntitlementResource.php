<?php

namespace Modules\Employee\Transformers\EmployeeFinancialEntitlement;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeFinancialEntitlementResource
 */
class EmployeeFinancialEntitlementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'basic_salary' => $this->basic_salary,
            'salary_type_id' => $this->salary_type_id,
            'currency_id' => $this->currency_id,
            'iban' => $this->iban,
            'cost_center' => $this->cost_center,
            'salary_payment_method' => $this->salary_payment_method,
            'bank_id' => $this->bank_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
