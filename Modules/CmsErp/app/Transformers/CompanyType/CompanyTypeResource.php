<?php

namespace Modules\CmsErp\Transformers\CompanyType;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyTypeResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'company_type' => $this->getTranslations('company_type'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
