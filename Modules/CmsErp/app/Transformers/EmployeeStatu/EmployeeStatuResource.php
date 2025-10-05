<?php

namespace Modules\CmsErp\Transformers\EmployeeStatu;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeStatuResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'status_name' => $this->getTranslations('status_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
