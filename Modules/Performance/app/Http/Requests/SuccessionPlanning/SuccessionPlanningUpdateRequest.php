<?php

namespace Modules\Performance\Http\Requests\SuccessionPlanning;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class SuccessionPlanningUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'position_id' => 'sometimes|required|integer|exists:positions,id',
            'readiness_rating' => 'nullable|sometimes|string|max:255',
            'development_plan' => 'nullable|sometimes|string',
        ]);
    }
}
