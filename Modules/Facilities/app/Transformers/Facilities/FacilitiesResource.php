<?php

namespace Modules\Facilities\Transformers\Facilities;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 FacilitiesResource
 */
class FacilitiesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'have_branches' => $this->have_branches,
            'employee_count' => $this->employee_count,
            'national_number_alone' => $this->national_number_alone,
            'status' => $this->status,
            'activity' => $this->activity,
            'completion_percentage' => $this->completion_percentage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
