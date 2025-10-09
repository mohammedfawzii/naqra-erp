<?php

namespace Modules\Facilities\Http\Requests\MedicalInsurancesFacilities;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class MedicalInsurancesFacilitiesUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'avater' => 'nullable|sometimes|string|max:255',
            'company_name' => 'sometimes|required|string|max:255',
            'policy_number' => 'sometimes|required|string|max:255|unique:medical_insurances_facilities,policy_number,'.$this->route('medicalInsurancesFacilities').',id',
            'medical_insurance_categories_id' => 'sometimes|required|integer|exists:medical_insurance_categories,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
        ]);
    }
}
