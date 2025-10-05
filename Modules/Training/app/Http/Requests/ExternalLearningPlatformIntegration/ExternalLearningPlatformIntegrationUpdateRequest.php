<?php

namespace Modules\Training\Http\Requests\ExternalLearningPlatformIntegration;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class ExternalLearningPlatformIntegrationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'platform_name' => 'sometimes|required|string|max:255',
            'integration_status' => 'sometimes|required|in:active,failed,pending',
            'last_sync_date' => 'nullable|sometimes|date',
        ]);
    }
}
