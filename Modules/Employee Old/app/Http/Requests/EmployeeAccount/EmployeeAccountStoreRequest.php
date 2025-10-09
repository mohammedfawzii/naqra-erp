<?php

namespace Modules\Employee\Http\Requests\EmployeeAccount;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeAccountStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'approved' => 'required|in:yes,no',
            'send_login_email' => 'required|boolean',
        ]);
    }
}
