<?php

namespace Modules\Facilities\Transformers\DigitalFacility;

use Illuminate\Http\Resources\Json\JsonResource;

class DigitalFacilityResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'name' => $resource->name,
            'total_employees' => $resource->total_employees,
            'unified_national_number' => $resource->unified_national_number,
            'tax_number' => $resource->tax_number,
            'commercial_record_value' => $resource->commercial_record_value,
            'capital' => $resource->capital,
            'start_date' => $resource->start_date,
            'annual_confirmation_date' => $resource->annual_confirmation_date,
            'financial_year_start' => $resource->financial_year_start,
            'financial_year_end' => $resource->financial_year_end,
            'facilityAttachments' => $resource->facilityAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
