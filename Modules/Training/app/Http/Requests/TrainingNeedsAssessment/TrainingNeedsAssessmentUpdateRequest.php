<?php

namespace Modules\Training\Http\Requests\TrainingNeedsAssessment;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class TrainingNeedsAssessmentUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'needs' => 'sometimes|required|string',
            'needs_priority' => 'sometimes|required|in:high,medium,low',
            'needs_source' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
