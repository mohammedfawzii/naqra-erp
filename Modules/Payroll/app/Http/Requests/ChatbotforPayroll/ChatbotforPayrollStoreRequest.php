<?php

namespace Modules\Payroll\Http\Requests\ChatbotforPayroll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ChatbotforPayrollStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer',
            'query_type' => 'required|in:salary,benefit,tax,leave,other',
            'date' => 'required|date',
            'query_date' => 'required|date',
            'query_status' => 'required|in:pending,in_progress,resolved,closed',
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
