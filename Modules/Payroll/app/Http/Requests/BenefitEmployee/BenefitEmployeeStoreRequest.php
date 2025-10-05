<?php

namespace Modules\Payroll\Http\Requests\BenefitEmployee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BenefitEmployeeStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'benefit_types_id' => 'required|integer|exists:benefit_types,id',
            'amount' => 'required|numeric',
            'start_date' => 'nullable|date',
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
