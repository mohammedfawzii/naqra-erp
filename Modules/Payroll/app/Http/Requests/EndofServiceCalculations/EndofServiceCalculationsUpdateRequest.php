<?php

namespace Modules\Payroll\Http\Requests\EndofServiceCalculations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EndofServiceCalculationsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer|exists:employeeinfos,id',
            'service_duration' => 'sometimes|required|integer',
            'end_of_service_amount' => 'sometimes|required|numeric',
            'end_date' => 'sometimes|required|date',
            'calculation_status' => 'sometimes|required|in:pending,calculated,approved,paid',
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
