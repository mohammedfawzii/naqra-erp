<?php

namespace Modules\CmsErp\Transformers\BloodType;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodTypeResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'blood_type' => $this->getTranslations('blood_type'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
