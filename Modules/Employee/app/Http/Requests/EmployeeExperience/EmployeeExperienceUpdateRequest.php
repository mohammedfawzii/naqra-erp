<?php

namespace Modules\Employee\Http\Requests\EmployeeExperience;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeExperienceUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'entity_name' => 'nullable|sometimes|string|max:255',
            'job_title' => 'nullable|sometimes|array',
            'start_date' => 'nullable|sometimes|date',
            'end_date' => 'nullable|sometimes|date',
            'volunteer_experiences' => 'nullable|sometimes|string|max:255',
            'unofficial_experiences' => 'nullable|sometimes|string|max:255',
            'previous_salary' => 'nullable|sometimes|string|max:255',
            'previous_evaluation' => 'nullable|sometimes|string|max:255',
            'leaving_reason' => 'nullable|sometimes|string|max:255',
            'responsibilities' => 'nullable|sometimes|string',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
