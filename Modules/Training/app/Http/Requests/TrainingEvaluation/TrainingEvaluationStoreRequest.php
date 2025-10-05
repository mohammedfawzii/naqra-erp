<?php

namespace Modules\Training\Http\Requests\TrainingEvaluation;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class TrainingEvaluationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'required|integer|exists:courses,id',
            'rating' => 'required',
            'feedback' => 'nullable|string',
            'satisfaction_level' => 'required|in:very_low,low,medium,high,very_high',
        ]);
    }
}
