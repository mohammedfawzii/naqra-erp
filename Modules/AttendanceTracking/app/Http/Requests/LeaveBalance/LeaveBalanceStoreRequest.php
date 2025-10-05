<?php

namespace Modules\AttendanceTracking\Http\Requests\LeaveBalance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class LeaveBalanceStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'required|integer|exists:holidays_lists,id',
            'available_balance' => 'required|integer',
            'used_balance' => 'required|integer',
        ]);
    }
}
