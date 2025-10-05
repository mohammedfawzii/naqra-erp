<?php

namespace Modules\Payroll\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PayrollUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer|exists:employeeinfos,id',
            'basic_salary' => 'sometimes|required|numeric',
            'allowances' => 'sometimes|required|numeric',
            'overtime_hours' => 'sometimes|required|integer',
            'overtime_amount' => 'sometimes|required|numeric',
            'deductions' => 'sometimes|required|numeric',
            'gross_salary' => 'sometimes|required|numeric',
            'net_salary' => 'sometimes|required|numeric',
            'payment_method_id' => 'sometimes|required|integer|exists:payment_methods,id',
            'currency_id' => 'sometimes|required|integer|exists:currencies,id',
            'payment_date' => 'sometimes|required|date',
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
