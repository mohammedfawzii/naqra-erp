<?php

namespace Modules\Performance\Http\Requests\Evaluation;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class EvaluationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'evaluation_date' => 'required|date',
            'rating' => 'required',
            'comments' => 'nullable|string',
            'competencies' => 'nullable|string|max:255',
        ]);
    }
}
