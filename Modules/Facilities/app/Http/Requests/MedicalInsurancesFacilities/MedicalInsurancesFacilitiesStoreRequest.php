<?php

namespace Modules\Facilities\Http\Requests\MedicalInsurancesFacilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MedicalInsurancesFacilitiesStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'policy_number' => 'required|string|max:255|unique:medical_insurances_facilities,policy_number',
            'medical_insurance_categories_id' => 'required|integer|exists:medical_insurance_categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
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
