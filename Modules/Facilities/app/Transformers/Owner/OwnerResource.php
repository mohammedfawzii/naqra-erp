<?php

namespace Modules\Facilities\Transformers\Owner;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'full_name' => $resource->full_name,
            'ownerType' => $resource->ownerType ? $resource->ownerType->getTranslation('ownership_type', app()->getLocale()) : null,
            'national_id_number' => $resource->national_id_number,
            'jobTitle' => $resource->jobTitle ? $resource->jobTitle->getTranslation('title', app()->getLocale()) : null,

            'date_of_birth' => $resource->date_of_birth,
            'gender' => $resource->gender,
            'country' => $resource->country ? $resource->country->getTranslation('name', app()->getLocale()) : null,
            'city' => $resource->city ? $resource->city->getTranslation('name', app()->getLocale()) : null,
            'company_details' => $resource->company_details,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
