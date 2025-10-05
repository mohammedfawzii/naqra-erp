<?php

namespace Modules\AttendanceTracking\Http\Requests\AttendanceTracking;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class AttendanceTrackingStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_date' => 'required|date',
            'attendance_type' => 'required|in:present,absent,late,leave',
            'check_in_time' => 'nullable',
            'check_out_time' => 'nullable',
            'overtime_hours' => 'required|numeric',
            'working_hours' => 'required|numeric',
        ]);
    }
}
