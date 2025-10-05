<?php

namespace Modules\AttendanceTracking\Http\Requests\TimeTrackingIntegration;

 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class TimeTrackingIntegrationUpdateRequest extends formRequest
{
   public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'system_name' => 'sometimes|string|max:255',
            'integration_type' => 'sometimes|in:api,file_import,manual',
            'integration_status' => 'sometimes|in:active,inactive,error',
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


