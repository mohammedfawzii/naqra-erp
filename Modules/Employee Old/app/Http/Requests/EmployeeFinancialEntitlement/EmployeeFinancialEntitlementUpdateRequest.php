<?php

namespace Modules\Employee\Http\Requests\EmployeeFinancialEntitlement;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeFinancialEntitlementUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'basic_salary' => 'nullable|sometimes|numeric',
            'salary_type_id' => 'nullable|sometimes|exists:salary_types,id',
            'currency_id' => 'nullable|sometimes|exists:currencies,id',
            'iban' => 'nullable|sometimes|string|max:34',
            'cost_center' => 'nullable|sometimes|string|max:255',
            'salary_payment_method' => 'nullable|sometimes|string|max:255',
            'bank_id' => 'nullable|sometimes|exists:banks,id',
        ]);
    }
}
