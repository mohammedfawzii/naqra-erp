<?php

namespace Modules\CmsErp\Transformers\MaritalStatus;

use Illuminate\Http\Resources\Json\JsonResource;

class MaritalStatusResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'status_type' => $this->getTranslations('status_type'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
