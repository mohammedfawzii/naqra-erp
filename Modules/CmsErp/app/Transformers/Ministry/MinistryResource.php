<?php

namespace Modules\CmsErp\Transformers\Ministry;

use Illuminate\Http\Resources\Json\JsonResource;

class MinistryResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'ministry_name' => $this->getTranslations('ministry_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
