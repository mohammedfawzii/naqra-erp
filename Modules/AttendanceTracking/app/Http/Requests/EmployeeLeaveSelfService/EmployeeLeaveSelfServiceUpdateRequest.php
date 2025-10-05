<?php

namespace Modules\AttendanceTracking\Http\Requests\EmployeeLeaveSelfService;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class EmployeeLeaveSelfServiceUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'sometimes|required|integer|exists:holidays_lists,id',
            'request_status' => 'sometimes|required|in:pending,approved,rejected',
        ]);
    }
}
