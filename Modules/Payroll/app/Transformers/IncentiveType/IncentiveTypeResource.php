<?php

namespace Modules\Payroll\Transformers\IncentiveType;

use Illuminate\Http\Resources\Json\JsonResource;

class IncentiveTypeResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'type' => $resource->getTranslation('type', app()->getLocale()),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
