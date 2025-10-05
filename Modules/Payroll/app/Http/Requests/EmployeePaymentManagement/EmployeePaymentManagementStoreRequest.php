<?php

namespace Modules\Payroll\Http\Requests\EmployeePaymentManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EmployeePaymentManagementStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'bank_id' => 'required|integer|exists:banks,id',
            'payment_method_id' => 'required|integer|exists:payment_methods,id',
            'bank_account_number' => 'required|string|max:255',
            'iban' => 'required|string|max:255',
            'payroll_date' => 'required|date',
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
