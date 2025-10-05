<?php

namespace Modules\Facilities\Http\Requests\License;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LicenseUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ministry_name_id' => 'sometimes|required|integer',
            'license_address' => 'sometimes|required|string|max:255',
            'license_number' => 'sometimes|required|string|max:255',
            'license_type_id' => 'sometimes|required|string|max:255|exists:license_types,id',
            'license_value' => 'sometimes|required|integer',
            'branch_area' => 'sometimes|required|integer',
            'license_start_date' => 'sometimes|required|date',
            'license_end_date' => 'sometimes|required|date',
            'branch_id' => 'nullable|sometimes|integer|exists:branches,id',
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
