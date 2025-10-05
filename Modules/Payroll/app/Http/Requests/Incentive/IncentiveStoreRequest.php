<?php

namespace Modules\Payroll\Http\Requests\Incentive;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class IncentiveStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'incentive_types_id' => 'required|integer|exists:incentive_types,id',
            'amount' => 'required|numeric',
            'issue_date' => 'required|date',
            'incentive_status_id' => 'required|integer|exists:incentive_statuses,id',
             'performance_rating' => 'required|integer',
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
