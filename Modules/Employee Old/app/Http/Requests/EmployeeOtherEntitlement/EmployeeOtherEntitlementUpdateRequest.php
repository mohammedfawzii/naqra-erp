<?php

namespace Modules\Employee\Http\Requests\EmployeeOtherEntitlement;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeOtherEntitlementUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'entitlement_name' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
