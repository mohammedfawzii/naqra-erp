<?php

namespace Modules\AttendanceTracking\Http\Requests\EmployeeLeaveSelfService;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class EmployeeLeaveSelfServiceStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'required|integer|exists:holidays_lists,id',
            'request_status' => 'required|in:pending,approved,rejected',
        ]);
    }
}
