<?php

namespace Modules\CmsErp\Transformers\Headquarter;

use Illuminate\Http\Resources\Json\JsonResource;

class HeadquarterResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'headquarters' => $this->getTranslations('headquarters'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
