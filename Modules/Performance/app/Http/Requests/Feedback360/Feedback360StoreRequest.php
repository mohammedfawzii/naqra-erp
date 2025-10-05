<?php

namespace Modules\Performance\Http\Requests\Feedback360;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class Feedback360StoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'evaluator_name' => 'required|string|max:255',
            'evaluator_designation' => 'nullable|string|max:255',
            'rating' => 'required|numeric',
            'comment' => 'nullable|string',
            'source' => 'nullable|string|max:255',
        ]);
    }
}
