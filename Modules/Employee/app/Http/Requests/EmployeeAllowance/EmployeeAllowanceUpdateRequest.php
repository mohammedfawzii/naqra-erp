<?php

namespace Modules\Employee\Http\Requests\EmployeeAllowance;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeAllowanceUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'entitlement_name' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric',
        ]);
    }
}
