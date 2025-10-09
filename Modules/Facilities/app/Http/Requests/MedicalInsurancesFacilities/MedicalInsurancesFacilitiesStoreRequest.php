<?php

namespace Modules\Facilities\Http\Requests\MedicalInsurancesFacilities;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class MedicalInsurancesFacilitiesStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'avater' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'policy_number' => 'required|string|max:255|unique:medical_insurances_facilities,policy_number',
            'medical_insurance_categories_id' => 'required|integer|exists:medical_insurance_categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    }
}
