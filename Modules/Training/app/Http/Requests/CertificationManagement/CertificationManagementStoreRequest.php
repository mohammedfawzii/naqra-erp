<?php

namespace Modules\Training\Http\Requests\CertificationManagement;

use App\Http\Requests\BaseRequest\BaseStoreRequest;
class CertificationManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'certification_name' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiration_date' => 'nullable|date',
            'certification_status' => 'required|in:valid,expired,pending',
        ]);
    }
}
