<?php

namespace Modules\Facilities\Http\Requests\DigitalFacility;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class DigitalFacilityStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'unified_national_number' => 'required|string|max:255',
            'tax_number' => 'required|string|max:255',
            'commercial_record_value' => 'required|integer',
            'capital' => 'required|integer',
            'start_date' => 'required|date',
            'annual_confirmation_date' => 'required|date',
            'financial_year_start' => 'required|date',
            'financial_year_end' => 'required|date',
        ]);
    }
}
