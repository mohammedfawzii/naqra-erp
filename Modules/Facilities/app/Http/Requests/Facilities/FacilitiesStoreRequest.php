<?php

namespace Modules\Facilities\Http\Requests\Facilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FacilitiesStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img' => 'nullable|string|max:255|max:255|file',
            'unified_national_number' => 'nullable|string|max:255',
            'company_name_ar' => 'required|string|max:255',
            'company_name_en' => 'required|string|max:255',
            'company_type_id' => 'required|integer|exists:company_types,id',
            'company_size_id' => 'required|integer|exists:company_sizes,id',
            'company_headquarters_id' => 'required|integer|exists:company_headquarters,id',
            'company_activities_id' => 'required|integer|exists:company_activities,id',
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
