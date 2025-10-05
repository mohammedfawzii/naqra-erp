<?php

namespace Modules\Training\Http\Requests\TrainingNeedsAssessment;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class TrainingNeedsAssessmentStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'needs' => 'required|string',
            'needs_priority' => 'required|in:high,medium,low',
            'needs_source' => 'nullable|string|max:255',
        ]);
    }
}
