<?php

namespace Modules\Performance\Http\Requests\Feedback360;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class Feedback360UpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'evaluator_name' => 'sometimes|required|string|max:255',
            'evaluator_designation' => 'nullable|sometimes|string|max:255',
            'rating' => 'sometimes|required|numeric',
            'comment' => 'nullable|sometimes|string',
            'source' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
