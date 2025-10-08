<?php

namespace Modules\Employee\Http\Requests\EmployeeFinancialEntitlement;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeFinancialEntitlementStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'basic_salary' => 'nullable|numeric',
            'salary_type_id' => 'nullable|exists:salary_types,id',
            'currency_id' => 'nullable|exists:currencies,id',
            'iban' => 'nullable|string|max:34',
            'cost_center' => 'nullable|string|max:255',
            'salary_payment_method' => 'nullable|string|max:255',
            'bank_id' => 'nullable|exists:banks,id',
        ]);
    }
}
