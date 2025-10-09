<?php

namespace Modules\Facilities\Transformers\MedicalInsurancesFacilities;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 MedicalInsurancesFacilitiesResource
 */
class MedicalInsurancesFacilitiesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'avater' => $this->avater,
            'company_name' => $this->company_name,
            'policy_number' => $this->policy_number,
            'medical_insurance_categories_id' => $this->medical_insurance_categories_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
