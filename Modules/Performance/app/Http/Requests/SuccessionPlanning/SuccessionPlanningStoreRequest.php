<?php

namespace Modules\Performance\Http\Requests\SuccessionPlanning;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class SuccessionPlanningStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'position_id' => 'required|integer|exists:positions,id',
            'readiness_rating' => 'nullable|string|max:255',
            'development_plan' => 'nullable|string',
        ]);
    }
}
