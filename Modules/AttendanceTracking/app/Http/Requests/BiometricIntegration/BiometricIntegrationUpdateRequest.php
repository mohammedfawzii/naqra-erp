<?php

namespace Modules\AttendanceTracking\Http\Requests\BiometricIntegration;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class BiometricIntegrationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'biometric_type' => 'sometimes|required|in:fingerprint,face,iris,voice',
            'registration_date' => 'sometimes|required|date',
        ]);
    }
}
