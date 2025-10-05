<?php

namespace Modules\CmsErp\Transformers\Allowance;

use Illuminate\Http\Resources\Json\JsonResource;

class AllowanceResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'allowance_name' => $resource->allowance_name,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
