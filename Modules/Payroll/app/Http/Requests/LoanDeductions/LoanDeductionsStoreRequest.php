<?php

namespace Modules\Payroll\Http\Requests\LoanDeductions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoanDeductionsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'loan_type_id' => 'required|integer|exists:loan_types,id',
            'deduction_percentage' => 'nullable|numeric',
            'deduction_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'deduction_status' => 'required|in:pending,active,completed,cancelled',
            'end_date' => 'required|date',
            'payroll_attachments_id' => 'required|integer|exists:payroll_attachments,reference_number',
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
