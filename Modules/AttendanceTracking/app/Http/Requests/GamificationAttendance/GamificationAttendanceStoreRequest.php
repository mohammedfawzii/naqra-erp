<?php

namespace Modules\AttendanceTracking\Http\Requests\GamificationAttendance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class GamificationAttendanceStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_points' => 'required|integer',
            'earned_rewards' => 'required|string|max:255',
            'progress_level' => 'required|string|max:255',
        ]);
    }
}
