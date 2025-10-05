<?php

namespace Modules\Training\Http\Requests\LicensingAndCertificationManagement;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class LicensingAndCertificationManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'license_name' => 'required|string|max:255',
            'renewal_date' => 'nullable|date',
            'renewal_status' => 'required|in:renewed,pending,expired',
        ]);
    }
}
