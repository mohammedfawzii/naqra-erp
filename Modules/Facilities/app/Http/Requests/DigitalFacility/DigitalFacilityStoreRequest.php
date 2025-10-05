<?php

namespace Modules\Facilities\Http\Requests\DigitalFacility;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DigitalFacilityStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'total_employees' => 'required|integer',
            'unified_national_number' => 'required|string|max:255',
            'tax_number' => 'required|string|max:255',
            'commercial_record_value' => 'required|integer',
            'capital' => 'required|integer',
            'start_date' => 'required|date',
            'annual_confirmation_date' => 'required|date',
            'financial_year_start' => 'required|date',
            'financial_year_end' => 'required|date',
            'facility_attachments_id' => 'required|string|max:255|exists:facility_attachments,reference_number',
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
