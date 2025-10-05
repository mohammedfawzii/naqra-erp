<?php

namespace Modules\AttendanceTracking\Http\Requests\LeaveRequest;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class LeaveRequestStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'required|integer|exists:holidays_lists,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'request_status' => 'required|in:pending,approved,rejected',
        ]);
    }
}
