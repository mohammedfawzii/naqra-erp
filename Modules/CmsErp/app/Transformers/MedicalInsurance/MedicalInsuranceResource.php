<?php

namespace Modules\CmsErp\Transformers\MedicalInsurance;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalInsuranceResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'insurance_name' => $this->getTranslations('insurance_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
