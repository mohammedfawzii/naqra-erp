<?php

namespace Modules\Facilities\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class OwnerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'sometimes|required|string|max:255',
            'owner_type_id' => 'sometimes|required',
            'national_id_number' => 'sometimes|required|string|max:255',
            'job_title_id' => 'sometimes|required',
            'date_of_birth' => 'nullable|sometimes|date',
            'gender' => 'nullable|sometimes|in:male,female',
            'country_id' => 'sometimes|required|exists:countries,id',
            'city_id' => 'sometimes|required|exists:cities,id',
            'company_details' => 'nullable|sometimes|string',
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
