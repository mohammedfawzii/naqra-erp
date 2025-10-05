<?php

namespace Modules\CmsErp\Transformers\TrialPeriod;

use Illuminate\Http\Resources\Json\JsonResource;

class TrialPeriodResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'period_long' => $this->getTranslations('period_long'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
