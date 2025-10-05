<?php

namespace Modules\Performance\Http\Requests\LearningManagementIntegration;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class LearningManagementIntegrationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'learning_platform' => 'required|string|max:255',
            'integration_status' => 'nullable|string|max:255',
            'suggested_course' => 'nullable|string|max:255',
        ]);
    }
}
