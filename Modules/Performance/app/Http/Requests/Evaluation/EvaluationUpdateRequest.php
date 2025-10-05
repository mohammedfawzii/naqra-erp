<?php

namespace Modules\Performance\Http\Requests\Evaluation;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class EvaluationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'evaluation_date' => 'sometimes|required|date',
            'rating' => 'sometimes|required',
            'comments' => 'nullable|sometimes|string',
            'competencies' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
