<?php

namespace Modules\CmsErp\Transformers\ActivityGeneral;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityGeneralResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
