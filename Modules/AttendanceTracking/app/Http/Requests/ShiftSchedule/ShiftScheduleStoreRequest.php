<?php

namespace Modules\AttendanceTracking\Http\Requests\ShiftSchedule;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class ShiftScheduleStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'shift_type' => 'required|in:morning,evening,night,flexible',
            'shift_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
        ]);
    }
}
