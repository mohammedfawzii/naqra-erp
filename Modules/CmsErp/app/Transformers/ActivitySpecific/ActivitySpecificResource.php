<?php

namespace Modules\CmsErp\Transformers\ActivitySpecific;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivitySpecificResource extends JsonResource
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
