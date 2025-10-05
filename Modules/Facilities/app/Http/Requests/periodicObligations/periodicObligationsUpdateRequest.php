<?php

namespace Modules\Facilities\Http\Requests\periodicObligations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class periodicObligationsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'zakat_due_date' => 'nullable|sometimes|date',
            'zakat_reminder_date' => 'nullable|sometimes|date',
            'tax_declaration_due_date' => 'nullable|sometimes|date',
            'tax_declaration_reminder_date' => 'nullable|sometimes|date',
            'salary_due_date' => 'nullable|sometimes|date',
            'salary_reminder_date' => 'nullable|sometimes|date',
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
