<?php

declare(strict_types=1);

namespace Modules\Facilities\Http\Requests\BaseRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function baseRules(): array
    {
        return [
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

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'status'  => 422,
                'message' => 'Validation errors',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
