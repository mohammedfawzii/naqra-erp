<?php

namespace Modules\Performance\Http\Requests\DevelopmentPlan;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class DevelopmentPlanStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'description' => 'nullable|string',
            'targeted_skills' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string|max:255',
        ]);
    }
}
