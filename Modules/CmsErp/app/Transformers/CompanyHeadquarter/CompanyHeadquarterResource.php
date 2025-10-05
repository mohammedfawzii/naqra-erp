<?php

namespace Modules\CmsErp\Transformers\CompanyHeadquarter;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyHeadquarterResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'headquarter_name' => $this->getTranslations('headquarter_name'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
