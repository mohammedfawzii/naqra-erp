<?php

namespace Modules\Employee\Http\Requests\EmployeeCourse;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeCourseUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_name' => 'nullable|sometimes|string|max:255',
            'course_type' => 'nullable|sometimes|string|max:255',
            'program_type' => 'nullable|sometimes|string|max:255',
            'sponsored' => 'nullable|sometimes|string|max:255',
            'start_date' => 'nullable|sometimes|date',
            'end_date' => 'nullable|sometimes|date',
            'course_value' => 'nullable|sometimes|numeric',
            'trainer' => 'nullable|sometimes|string|max:255',
            'training_entity' => 'nullable|sometimes|string|max:255',
            'training_location' => 'nullable|sometimes|string|max:255',
            'country_id' => 'nullable|sometimes|exists:countries,id',
            'city_id' => 'nullable|sometimes|exists:cities,id',
            'location' => 'nullable|sometimes|string|max:255',
            'issuer' => 'nullable|sometimes|string|max:255',
            'certificate_number' => 'nullable|sometimes|string|max:255',
            'certificate_end_date' => 'nullable|sometimes|date',
            'certificate_issue_date' => 'nullable|sometimes|date',
            'grade' => 'nullable|sometimes|string|max:255',
            'hours_count' => 'nullable|sometimes|integer',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
