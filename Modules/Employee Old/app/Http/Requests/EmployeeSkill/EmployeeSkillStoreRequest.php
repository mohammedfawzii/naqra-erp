<?php

namespace Modules\Employee\Http\Requests\EmployeeSkill;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeSkillStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'skill' => 'required|string|max:255',
            'skill_level' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
    }
}
