<?php

namespace Modules\Employee\Http\Requests\AttendanceEmployee;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class AttendanceEmployeeStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'basic_hours' => 'required|integer',
            'attendance_device_id' => 'required|integer',
            'shift_change' => 'required|string|max:255',
        ]);
    }
}
