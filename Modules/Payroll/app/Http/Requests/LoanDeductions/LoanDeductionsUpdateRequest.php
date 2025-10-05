<?php

namespace Modules\Payroll\Http\Requests\LoanDeductions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoanDeductionsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer|exists:employeeinfos,id',
            'loan_type_id' => 'sometimes|required|integer|exists:loan_types,id',
            'deduction_percentage' => 'nullable|sometimes|numeric',
            'deduction_amount' => 'sometimes|required|numeric',
            'start_date' => 'sometimes|required|date',
            'deduction_status' => 'sometimes|required|in:pending,active,completed,cancelled',
            'end_date' => 'nullable|sometimes|date',
            'payroll_attachments_id' => 'sometimes|required|integer|exists:payroll_attachments,reference_number',
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
