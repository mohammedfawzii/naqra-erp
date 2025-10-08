<?php

namespace Modules\Employee\Http\Requests\EmployeeHoliday;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeHolidayUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'total_balance' => 'sometimes|required|integer',
            'remaining_balance' => 'sometimes|required|integer',
            'holiday_list_id' => 'sometimes|required|exists:holiday_lists,id',
            'status' => 'sometimes|required|string|max:255',
            'list' => 'nullable|sometimes|array',
        ]);
    }
}
