<?php

namespace Modules\Payroll\Http\Requests\TaxDeduction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TaxDeductionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer',
            'tax_deduction_types_id' => 'sometimes|required|integer|exists:tax_deduction_types,id',
            'amount' => 'sometimes|required|numeric',
            'deduction_date' => 'sometimes|required|date',
            'tax_deduction_statuses_id' => 'sometimes|required|integer|exists:tax_deduction_statuses,id',
            'payroll_attachments_id' => 'sometimes|required|integer|exists:payroll_attachments,id',
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
