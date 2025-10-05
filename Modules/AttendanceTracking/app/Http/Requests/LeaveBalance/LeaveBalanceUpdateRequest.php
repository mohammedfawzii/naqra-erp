<?php

namespace Modules\AttendanceTracking\Http\Requests\LeaveBalance;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class LeaveBalanceUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'holidays_list_id' => 'sometimes|required|integer|exists:holidays_lists,id',
            'available_balance' => 'sometimes|required|integer',
            'used_balance' => 'sometimes|required|integer',
        ]);
    }
}
