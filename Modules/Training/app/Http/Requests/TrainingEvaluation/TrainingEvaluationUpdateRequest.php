<?php

namespace Modules\Training\Http\Requests\TrainingEvaluation;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class TrainingEvaluationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'sometimes|required|integer|exists:courses,id',
            'rating' => 'sometimes|required',
            'feedback' => 'nullable|sometimes|string',
            'satisfaction_level' => 'sometimes|required|in:very_low,low,medium,high,very_high',
        ]);
    }
}
