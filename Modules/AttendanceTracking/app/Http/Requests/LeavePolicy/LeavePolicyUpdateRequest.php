<?php

namespace Modules\AttendanceTracking\Http\Requests\LeavePolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class LeavePolicyUpdateRequest extends formRequest
{ public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'holidays_list_id' => 'sometimes|integer|exists:holidays_lists,id',
            'policy_description' => 'nullable|string',
            'annual_balance' => 'sometimes|integer',
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


