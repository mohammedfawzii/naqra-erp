<?php

namespace Modules\AttendanceTracking\Http\Requests\BiometricIntegration;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class BiometricIntegrationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'biometric_type' => 'required|in:fingerprint,face,iris,voice',
            'registration_date' => 'required|date',
        ]);
    }
}
