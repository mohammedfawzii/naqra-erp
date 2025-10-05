<?php

namespace Modules\CmsErp\Transformers\ActivityPrivate;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityPrivateResource extends JsonResource
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
