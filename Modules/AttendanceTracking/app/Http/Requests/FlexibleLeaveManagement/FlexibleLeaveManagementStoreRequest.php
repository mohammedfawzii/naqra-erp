<?php

namespace Modules\AttendanceTracking\Http\Requests\FlexibleLeaveManagement;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class FlexibleLeaveManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'selected_leaves' => 'nullable|string|max:255',
            'leave_cost' => 'required|numeric',
            'holidays_list_id' => 'required|string|max:255|exists:holidays_lists,id',
        ]);
    }
}
