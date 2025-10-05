<?php

namespace App\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BaseUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function baseRules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer|exists:employeeinfos,id',
         'files'   => 'nullable|array',
          'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,xls|max:5120',

        ];
    }

    public function messages(): array
{
    return [
        'files.array'   => 'The files field must be an array.',
        'files.*.file'  => 'Each item must be a valid file.',
        'files.*.mimes' => 'Allowed file types: jpg, jpeg, png, pdf, doc, docx, xls, xlsx.',
        'files.*.max'   => 'Each file must not exceed 5MB.',
    ];
}
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error'   => $validator->errors()
        ], 422));
    }
}
