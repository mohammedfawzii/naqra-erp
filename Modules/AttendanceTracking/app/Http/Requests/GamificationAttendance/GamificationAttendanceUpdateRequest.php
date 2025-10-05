<?php

namespace Modules\AttendanceTracking\Http\Requests\GamificationAttendance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class GamificationAttendanceUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'attendance_points' => 'sometimes|required|integer',
            'earned_rewards' => 'sometimes|required|string|max:255',
            'progress_level' => 'sometimes|required|string|max:255',
        ]);
    }
}
