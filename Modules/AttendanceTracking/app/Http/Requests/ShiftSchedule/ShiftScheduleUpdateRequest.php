<?php

namespace Modules\AttendanceTracking\Http\Requests\ShiftSchedule;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class ShiftScheduleUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'shift_type' => 'sometimes|required|in:morning,evening,night,flexible',
            'shift_date' => 'sometimes|required|date',
            'start_time' => 'sometimes|required',
            'end_time' => 'nullable|sometimes',
        ]);
    }
}
