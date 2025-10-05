<?php

namespace Modules\CmsErp\Transformers\NoticePeriod;

use Illuminate\Http\Resources\Json\JsonResource;

class NoticePeriodResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'period_name' => $this->getTranslations('period_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
