<?php

namespace Modules\Facilities\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
 use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StoreBaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function baseRules(): array
    {
        return [
        //   'employee_id' => 'required|integer|exists:employees,id',
          'files'   => 'nullable|array',
          'files.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,xls|max:5120',
        //   'page_name'=>'required|in:home1,home2,home3,home4,home5,'

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
