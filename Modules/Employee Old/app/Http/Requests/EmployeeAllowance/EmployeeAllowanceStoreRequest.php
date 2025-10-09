<?php

namespace Modules\Employee\Http\Requests\EmployeeAllowance;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeAllowanceStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'entitlement_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);
    }
}
