<?php

namespace Modules\Employee\Http\Requests\EmployeeAccount;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeAccountUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'email' => 'sometimes|required|string|max:255',
            'password' => 'sometimes|required|string|max:255',
            'approved' => 'sometimes|required|in:yes,no',
            'send_login_email' => 'sometimes|required|boolean',
        ]);
    }
}
