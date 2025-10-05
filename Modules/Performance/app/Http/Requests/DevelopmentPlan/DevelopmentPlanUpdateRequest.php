<?php

namespace Modules\Performance\Http\Requests\DevelopmentPlan;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class DevelopmentPlanUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'description' => 'nullable|sometimes|string',
            'targeted_skills' => 'nullable|sometimes|string|max:255',
            'start_date' => 'nullable|sometimes|date',
            'end_date' => 'nullable|sometimes|date',
            'status' => 'sometimes|required|string|max:255',
        ]);
    }
}
