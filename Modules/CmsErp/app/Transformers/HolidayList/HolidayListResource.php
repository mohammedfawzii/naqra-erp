<?php

namespace Modules\CmsErp\Transformers\HolidayList;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidayListResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'holiday_name' => $this->getTranslations('holiday_name'),
            'holiday_duration' => $resource->holiday_duration,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
