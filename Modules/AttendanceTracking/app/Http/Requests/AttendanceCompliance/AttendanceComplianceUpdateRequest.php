<?php

namespace Modules\AttendanceTracking\Http\Requests\AttendanceCompliance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AttendanceComplianceUpdateRequest extends formRequest
{
     public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'compliance_type' => 'sometimes|in:policy,regulation,internal',
            'compliance_status' => 'sometimes|in:compliant,non_compliant,under_review',
            'review_date' => 'sometimes|date',
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



