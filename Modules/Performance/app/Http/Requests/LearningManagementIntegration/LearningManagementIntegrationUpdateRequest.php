<?php

namespace Modules\Performance\Http\Requests\LearningManagementIntegration;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class LearningManagementIntegrationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'learning_platform' => 'sometimes|required|string|max:255',
            'integration_status' => 'nullable|sometimes|string|max:255',
            'suggested_course' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
