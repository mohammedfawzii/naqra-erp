<?php

namespace Modules\Facilities\Http\Requests\DigitalFacility;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class DigitalFacilityUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'branch_id' => 'sometimes|required|exists:branches,id',
            'name' => 'sometimes|required|string|max:255',
            'unified_national_number' => 'sometimes|required|string|max:255',
            'tax_number' => 'sometimes|required|string|max:255',
            'commercial_record_value' => 'sometimes|required|integer',
            'capital' => 'sometimes|required|integer',
            'start_date' => 'sometimes|required|date',
            'annual_confirmation_date' => 'sometimes|required|date',
            'financial_year_start' => 'sometimes|required|date',
            'financial_year_end' => 'sometimes|required|date',
        ]);
    }
}
