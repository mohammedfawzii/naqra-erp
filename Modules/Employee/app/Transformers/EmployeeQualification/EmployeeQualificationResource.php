<?php

namespace Modules\Employee\Transformers\EmployeeQualification;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeQualificationResource
 */
class EmployeeQualificationResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                    return $this->mergeWithTimestamps([

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
       
        ]);
    }
}
