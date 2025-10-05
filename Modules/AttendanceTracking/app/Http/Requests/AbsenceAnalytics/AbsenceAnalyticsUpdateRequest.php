<?php

namespace Modules\AttendanceTracking\Http\Requests\AbsenceAnalytics;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AbsenceAnalyticsUpdateRequest extends formRequest
{
     public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'time_period' => '|sometimes|string|max:255',
            'absence_rate' => '|sometimes|numeric',
            'absence_reason' => 'nullable|string|max:255',
          'attendance_attachments_id' => '|sometimes|integer|exists:attendance_tracking_attachments,reference_number',

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



