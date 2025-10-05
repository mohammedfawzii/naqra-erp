<?php

namespace Modules\Payroll\Http\Requests\Payroll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PayrollStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'basic_salary' => 'required|numeric',
            'allowances' => 'required|numeric',
            'overtime_hours' => 'required|integer',
            'overtime_amount' => 'required|numeric',
            'deductions' => 'required|numeric',
            'gross_salary' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'payment_method_id' => 'required|integer|exists:payment_methods,id',
            'currency_id' => 'required|integer|exists:currencies,id',
            'payment_date' => 'required|date',
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
