<?php

namespace Modules\CmsErp\Transformers\CompanyActivity;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyActivityResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'activity_name' => $this->getTranslations('activity_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
