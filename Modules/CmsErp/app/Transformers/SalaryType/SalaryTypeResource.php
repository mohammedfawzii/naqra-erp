<?php

namespace Modules\CmsErp\Transformers\SalaryType;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryTypeResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'salary_type' => $this->getTranslations('salary_type'),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
