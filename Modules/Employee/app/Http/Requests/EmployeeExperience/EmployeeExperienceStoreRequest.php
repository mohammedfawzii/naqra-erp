<?php

namespace Modules\Employee\Http\Requests\EmployeeExperience;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeExperienceStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'entity_name' => 'required|string|max:255',
            'job_title' => 'nullable|array',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'volunteer_experiences' => 'required|string|max:255',
            'unofficial_experiences' => 'required|string|max:255',
            'previous_salary' => 'required|string|max:255',
            'previous_evaluation' => 'required|string|max:255',
            'leaving_reason' => 'required|string|max:255',
            'responsibilities' => 'required|string',
            'notes' => 'required|string',
        ]);
    }
}
