<?php

namespace Modules\Facilities\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BranchesStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:branches,name',
            'registration_number' => 'required|string|max:255',
            'address' => 'required|string',
            'branch_types_id' => 'required|integer|exists:branch_types,id',
            'registration_start_date' => 'required|date',
            'registration_end_date' => 'required|date',
            'facility_attachments_id' => 'required|integer|exists:facility_attachments,reference_number',
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
