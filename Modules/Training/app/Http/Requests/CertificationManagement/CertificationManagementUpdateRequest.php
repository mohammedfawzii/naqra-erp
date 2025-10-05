<?php

namespace Modules\Training\Http\Requests\CertificationManagement;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;


class CertificationManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'certification_name' => 'sometimes|required|string|max:255',
            'issue_date' => 'sometimes|required|date',
            'expiration_date' => 'nullable|sometimes|date',
            'certification_status' => 'sometimes|required|in:valid,expired,pending',
        ]);
    }
}
