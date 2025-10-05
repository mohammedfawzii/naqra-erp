<?php

namespace Modules\CmsErp\Transformers\EducationalLevel;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationalLevelResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'level_name' => $this->getTranslations('level_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
