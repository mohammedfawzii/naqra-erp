<?php

namespace Modules\Facilities\Http\Requests\MedicalInsurancesFacilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MedicalInsurancesFacilitiesUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'sometimes|required|string|max:255',
            'policy_number' => 'sometimes|required|string|max:255|unique:medical_insurances_facilities,policy_number,'.$this->route('medicalInsurancesFacilities').',id',
            'medical_insurance_categories_id' => 'sometimes|required|integer|exists:medical_insurance_categories,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error' => $validator->errors()
        ], 422));
    }
}
