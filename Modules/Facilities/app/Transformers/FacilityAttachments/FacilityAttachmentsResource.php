<?php

namespace Modules\Facilities\Transformers\FacilityAttachments;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityAttachmentsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->reference_number,

        ];
    }
}
