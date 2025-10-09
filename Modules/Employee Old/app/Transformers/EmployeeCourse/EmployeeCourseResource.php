<?php

namespace Modules\Employee\Transformers\EmployeeCourse;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeCourseResource
 */
class EmployeeCourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'course_name' => $this->course_name,
            'course_type' => $this->course_type,
            'program_type' => $this->program_type,
            'sponsored' => $this->sponsored,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'course_value' => $this->course_value,
            'trainer' => $this->trainer,
            'training_entity' => $this->training_entity,
            'training_location' => $this->training_location,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'location' => $this->location,
            'issuer' => $this->issuer,
            'certificate_number' => $this->certificate_number,
            'certificate_end_date' => $this->certificate_end_date,
            'certificate_issue_date' => $this->certificate_issue_date,
            'grade' => $this->grade,
            'hours_count' => $this->hours_count,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
