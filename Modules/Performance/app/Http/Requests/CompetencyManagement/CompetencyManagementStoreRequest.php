<?php

namespace Modules\Performance\Http\Requests\CompetencyManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class CompetencyManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'competency' => 'required|string|max:255',
            'competency_rating' => 'nullable|string|max:255',
            'target_competency' => 'nullable|string|max:255',
        ]);
    }
}
