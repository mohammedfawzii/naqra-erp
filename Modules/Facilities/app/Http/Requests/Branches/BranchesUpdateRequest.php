<?php

namespace Modules\Facilities\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BranchesUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255|unique:branches,name,'.$this->route('branches').',id',
            'registration_number' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string',
            'branch_types_id' => 'sometimes|required|integer|exists:branch_types,id',
            'registration_start_date' => 'sometimes|required|date',
            'registration_end_date' => 'sometimes|required|date',
            'facility_attachments_id' => 'sometimes|required|integer|exists:facility_attachments,reference_number',
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
