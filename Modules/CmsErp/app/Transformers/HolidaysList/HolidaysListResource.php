<?php

namespace Modules\CmsErp\Transformers\HolidaysList;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidaysListResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'holiday_type' => $this->getTranslations('holiday_type'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
