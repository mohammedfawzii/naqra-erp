<?php

namespace Modules\Employee\Http\Requests\EmployeeCourse;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeCourseStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_name' => 'nullable|string|max:255',
            'course_type' => 'nullable|string|max:255',
            'program_type' => 'nullable|string|max:255',
            'sponsored' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'course_value' => 'nullable|numeric',
            'trainer' => 'nullable|string|max:255',
            'training_entity' => 'nullable|string|max:255',
            'training_location' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'location' => 'nullable|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
            'certificate_end_date' => 'nullable|date',
            'certificate_issue_date' => 'nullable|date',
            'grade' => 'nullable|string|max:255',
            'hours_count' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);
    }
}
