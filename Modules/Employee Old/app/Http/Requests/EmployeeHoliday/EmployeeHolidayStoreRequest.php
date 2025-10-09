<?php

namespace Modules\Employee\Http\Requests\EmployeeHoliday;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeHolidayStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'total_balance' => 'required|integer',
            'remaining_balance' => 'required|integer',
            'holiday_list_id' => 'required|exists:holiday_lists,id',
            'status' => 'required|string|max:255',
            'list' => 'nullable|array',
        ]);
    }
}
