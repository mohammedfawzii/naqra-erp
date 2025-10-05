<?php

namespace Modules\Facilities\Transformers\Facilities;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilitiesResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'img' => $resource->img,
            'unified_national_number' => $resource->unified_national_number,
            'company_name_ar' => $resource->company_name_ar,
            'company_name_en' => $resource->company_name_en,
            'companyType' => $resource->companyType ? $resource->companyType->getTranslation('company_type', app()->getLocale()) : null,
            'companySize' => $resource->companySize ? $resource->companySize->getTranslation('type', app()->getLocale()) : null,
            'companyHeadquarters' => $resource->companyHeadquarters ? $resource->companyHeadquarters->getTranslation('headquarter_name', app()->getLocale()) : null,
            'companyActivities' => $resource->companyActivities ? $resource->companyActivities->getTranslation('activity_name', app()->getLocale()) : null,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
