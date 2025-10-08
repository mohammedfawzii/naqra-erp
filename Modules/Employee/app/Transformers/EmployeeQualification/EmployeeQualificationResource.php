<?php

namespace Modules\Employee\Transformers\EmployeeQualification;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeQualificationResource
 */
class EmployeeQualificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'university' => $this->university,
            'college' => $this->college,
            'qualification' => $this->qualification,
            'major' => $this->major,
            'degree' => $this->degree,
            'gpa' => $this->gpa,
            'graduation_year' => $this->graduation_year,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
