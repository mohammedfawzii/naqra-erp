<?php

namespace Modules\Facilities\Transformers\MedicalInsurancesFacilities;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalInsurancesFacilitiesResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'company_name' => $resource->company_name,
            'policy_number' => $resource->policy_number,
            'medicalInsuranceCategories' => $resource->medicalInsuranceCategories ? $resource->medicalInsuranceCategories->getTranslation('category_name', app()->getLocale()) : null,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
