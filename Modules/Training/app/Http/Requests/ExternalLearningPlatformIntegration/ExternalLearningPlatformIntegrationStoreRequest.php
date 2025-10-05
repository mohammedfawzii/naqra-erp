<?php

namespace Modules\Training\Http\Requests\ExternalLearningPlatformIntegration;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class ExternalLearningPlatformIntegrationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'platform_name' => 'required|string|max:255',
            'integration_status' => 'required|in:active,failed,pending',
            'last_sync_date' => 'nullable|date',
        ]);
    }
}
