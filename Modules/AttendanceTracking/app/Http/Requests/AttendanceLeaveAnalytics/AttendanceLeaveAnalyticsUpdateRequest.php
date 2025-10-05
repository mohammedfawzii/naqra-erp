<?php

namespace Modules\AttendanceTracking\Http\Requests\AttendanceLeaveAnalytics;

 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AttendanceLeaveAnalyticsUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'time_period' => 'sometimes|string|max:255',
            'attendance_rate' => 'sometimes|numeric',
            'absence_rate' => 'sometimes|numeric',
            'leave_taken_report' => 'sometimes|numeric',
            'attendance_attachments_id' => 'sometimes|integer|exists:attendance_tracking_attachments,reference_number',

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

