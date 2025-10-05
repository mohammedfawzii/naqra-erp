<?php

namespace Modules\Performance\Http\Requests\CompetencyManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class CompetencyManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'competency' => 'sometimes|required|string|max:255',
            'competency_rating' => 'nullable|sometimes|string|max:255',
            'target_competency' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
