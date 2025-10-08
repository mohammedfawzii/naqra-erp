<?php

namespace Modules\Employee\Transformers\EmployeeExperience;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeExperienceResource
 */
class EmployeeExperienceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'entity_name' => $this->entity_name,
            'job_title' => $this->job_title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'volunteer_experiences' => $this->volunteer_experiences,
            'unofficial_experiences' => $this->unofficial_experiences,
            'previous_salary' => $this->previous_salary,
            'previous_evaluation' => $this->previous_evaluation,
            'leaving_reason' => $this->leaving_reason,
            'responsibilities' => $this->responsibilities,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
