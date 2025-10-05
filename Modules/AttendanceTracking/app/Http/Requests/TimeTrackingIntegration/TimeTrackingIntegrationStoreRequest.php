<?php

namespace Modules\AttendanceTracking\Http\Requests\TimeTrackingIntegration;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class TimeTrackingIntegrationStoreRequest extends formRequest
{  public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'system_name' => 'required|string|max:255',
            'integration_type' => 'required|in:api,file_import,manual',
            'integration_status' => 'required|in:active,inactive,error',
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


