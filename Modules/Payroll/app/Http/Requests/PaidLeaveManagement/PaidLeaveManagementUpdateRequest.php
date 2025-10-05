<?php

namespace Modules\Payroll\Http\Requests\PaidLeaveManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PaidLeaveManagementUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer|exists:employeeinfos,id',
            'holidays_lists_id' => 'sometimes|required|string|max:255|exists:holidays_lists,id',
            'leave_balance' => 'sometimes|required|numeric',
            'leave_date' => 'sometimes|required|date',
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
