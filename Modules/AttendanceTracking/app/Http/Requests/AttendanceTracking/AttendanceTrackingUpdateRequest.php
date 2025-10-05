<?php

namespace Modules\AttendanceTracking\Http\Requests\AttendanceTracking;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class AttendanceTrackingUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_date' => 'sometimes|required|date',
            'attendance_type' => 'sometimes|required|in:present,absent,late,leave',
            'check_in_time' => 'nullable|sometimes',
            'check_out_time' => 'nullable|sometimes',
            'overtime_hours' => 'sometimes|required|numeric',
            'working_hours' => 'sometimes|required|numeric',
        ]);
    }
}
