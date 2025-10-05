<?php

namespace Modules\AttendanceTracking\Http\Requests\FlexibleLeaveManagement;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class FlexibleLeaveManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'selected_leaves' => 'nullable|sometimes|string|max:255',
            'leave_cost' => 'sometimes|required|numeric',
            'holidays_list_id' => 'sometimes|required|string|max:255|exists:holidays_lists,id',
        ]);
    }
}
