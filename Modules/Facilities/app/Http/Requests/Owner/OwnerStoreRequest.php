<?php

namespace Modules\Facilities\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class OwnerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'owner_type_id' => 'required|exists:company_types,id',
            'national_id_number' => 'required|string|max:255',
            'job_title_id' => 'required|exists:jop_titles,id',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'company_details' => 'nullable|string',
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
