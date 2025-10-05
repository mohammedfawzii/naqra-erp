<?php

namespace Modules\Payroll\Transformers\IncentiveStatus;

use Illuminate\Http\Resources\Json\JsonResource;

class IncentiveStatusResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'status' => $resource->getTranslation('status', app()->getLocale()),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
