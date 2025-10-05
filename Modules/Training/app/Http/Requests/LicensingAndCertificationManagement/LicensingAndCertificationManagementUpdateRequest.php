<?php

namespace Modules\Training\Http\Requests\LicensingAndCertificationManagement;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class LicensingAndCertificationManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'license_name' => 'sometimes|required|string|max:255',
            'renewal_date' => 'nullable|sometimes|date',
            'renewal_status' => 'sometimes|required|in:renewed,pending,expired',
        ]);
    }
}
