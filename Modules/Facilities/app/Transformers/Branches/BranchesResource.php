<?php

namespace Modules\Facilities\Transformers\Branches;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchesResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'name' => $resource->name,
            'registration_number' => $resource->registration_number,
            'address' => $resource->address,
            'branchTypes' => $resource->branchTypes ? $resource->branchTypes->getTranslation('type', app()->getLocale()) : null,
            'registration_start_date' => $resource->registration_start_date,
            'registration_end_date' => $resource->registration_end_date,
            'facilityAttachments' => $resource->facilityAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
