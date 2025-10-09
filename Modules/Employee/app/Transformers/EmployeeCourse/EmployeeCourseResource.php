<?php

namespace Modules\Employee\Transformers\EmployeeCourse;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeCourseResource
 */
class EmployeeCourseResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                    return $this->mergeWithTimestamps([

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
           
        ]);
    }
}
