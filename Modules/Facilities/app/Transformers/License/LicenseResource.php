<?php

namespace Modules\Facilities\Transformers\License;

use Illuminate\Http\Resources\Json\JsonResource;

class LicenseResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'ministryName' => $resource->ministry ? $resource->ministry->getTranslation('ministry_name', app()->getLocale()) : null,
            'license_address' => $resource->license_address,
            'license_number' => $resource->license_number,
            'licenseType' => $resource->licenseType ? $resource->licenseType->getTranslation('type', app()->getLocale()) : null,
            'license_value' => $resource->license_value,
            'branch_area' => $resource->branch_area,
            'license_start_date' => $resource->license_start_date,
            'license_end_date' => $resource->license_end_date,
            'branch' => $resource->branch?->name,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
