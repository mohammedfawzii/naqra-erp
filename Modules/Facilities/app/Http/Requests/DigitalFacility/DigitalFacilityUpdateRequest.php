<?php

namespace Modules\Facilities\Http\Requests\DigitalFacility;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DigitalFacilityUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'total_employees' => 'sometimes|required|integer',
            'unified_national_number' => 'sometimes|required|string|max:255',
            'tax_number' => 'sometimes|required|string|max:255',
            'commercial_record_value' => 'sometimes|required|integer',
            'capital' => 'sometimes|required|integer',
            'start_date' => 'sometimes|required|date',
            'annual_confirmation_date' => 'sometimes|required|date',
            'financial_year_start' => 'sometimes|required|date',
            'financial_year_end' => 'sometimes|required|date',
            'facility_attachments_id' => 'sometimes|required|string|max:255|exists:facility_attachments,reference_number',
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
