<?php

namespace Modules\AttendanceTracking\Http\Requests\RemoteAttendance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class RemoteAttendanceUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_location' => 'nullable|sometimes|string|max:255',
            'remote_check_in_time' => 'nullable|sometimes|date',
            'remote_check_out_time' => 'nullable|sometimes|date',
        ]);
    }
}
