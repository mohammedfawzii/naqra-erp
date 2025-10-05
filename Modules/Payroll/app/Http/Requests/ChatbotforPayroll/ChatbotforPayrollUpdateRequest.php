<?php

namespace Modules\Payroll\Http\Requests\ChatbotforPayroll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ChatbotforPayrollUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'sometimes|required|integer',
            'query_type' => 'sometimes|required|in:salary,benefit,tax,leave,other',
            'date' => 'sometimes|required|date',
            'query_date' => 'sometimes|required|date',
            'query_status' => 'sometimes|required|in:pending,in_progress,resolved,closed',
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
