<?php

namespace Modules\AttendanceTracking\Http\Requests\LeaveRequest;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class LeaveRequestUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'sometimes|required|integer|exists:holidays_lists,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
            'request_status' => 'sometimes|required|in:pending,approved,rejected',
        ]);
    }
}
