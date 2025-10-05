<?php

namespace Modules\AttendanceTracking\Http\Requests\RemoteAttendance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class RemoteAttendanceStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_location' => 'required|string|max:255',
            'remote_check_in_time' => 'required|date',
            'remote_check_out_time' => 'required|date',
        ]);
    }
}
