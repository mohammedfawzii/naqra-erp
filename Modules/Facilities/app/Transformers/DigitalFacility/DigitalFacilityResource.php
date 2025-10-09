<?php

namespace Modules\Facilities\Transformers\DigitalFacility;

use App\Transformers\BaseResource\BaseMetaResource;
 
/**
 * 🔹 DigitalFacilityResource
 */
class DigitalFacilityResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'branch_id' => optional($this->branch)->getTranslation('name', app()->getLocale()),
            'name' => $this->name,
            'unified_national_number' => $this->unified_national_number,
            'tax_number' => $this->tax_number,
            'commercial_record_value' => $this->commercial_record_value,
            'capital' => $this->capital,
            'start_date' => $this->start_date,
            'annual_confirmation_date' => $this->annual_confirmation_date,
            'financial_year_start' => $this->financial_year_start,
            'financial_year_end' => $this->financial_year_end,
            
        ]);
    }
}
