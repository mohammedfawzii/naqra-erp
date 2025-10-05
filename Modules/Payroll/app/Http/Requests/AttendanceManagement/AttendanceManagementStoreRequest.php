<?php

namespace Modules\Payroll\Http\Requests\AttendanceManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AttendanceManagementStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|integer|exists:employeeinfos,id',
            'attendance_date' => 'required|date',
            'time_in' => 'required|integer|exists:attendances,id',
            'time_out' => 'required|integer|exists:attendances,id',
            'work_hours' => 'required|integer',
            'overtime_hours' => 'required|integer',
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
