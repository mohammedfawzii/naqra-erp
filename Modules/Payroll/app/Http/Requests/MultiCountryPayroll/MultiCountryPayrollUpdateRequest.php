<?php

namespace Modules\Payroll\Http\Requests\MultiCountryPayroll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MultiCountryPayrollUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer',
            'country_id' => 'sometimes|required|integer|exists:countries,id',
            'basic_salary' => 'sometimes|required|numeric',
            'currency_id' => 'sometimes|required|integer|exists:currencies,id',
            'compliance_status' => 'sometimes|required|in:pending,compliant,non_compliant',
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
