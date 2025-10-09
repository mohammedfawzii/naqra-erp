<?php

namespace Modules\Employee\Http\Requests\EmployeeSkill;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeSkillUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'skill' => 'sometimes|required|string|max:255',
            'skill_level' => 'nullable|sometimes|string|max:255',
            'date' => 'nullable|sometimes|date',
        ]);
    }
}
