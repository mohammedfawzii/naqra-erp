<?php

namespace Modules\CmsErp\Transformers\MedicalInsuranceCategorie;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalInsuranceCategorieResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'category_name' => $this->getTranslations('category_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
