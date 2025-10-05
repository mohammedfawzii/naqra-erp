<?php

namespace Modules\AttendanceTracking\Http\Requests\AttendanceLeaveAnalytics;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AttendanceLeaveAnalyticsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'time_period' => 'required|string|max:255',
            'attendance_rate' => 'required|numeric',
            'absence_rate' => 'required|numeric',
            'leave_taken_report' => 'required|numeric',
            'attendance_attachments_id' => 'required|integer|exists:attendance_tracking_attachments,reference_number',

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

