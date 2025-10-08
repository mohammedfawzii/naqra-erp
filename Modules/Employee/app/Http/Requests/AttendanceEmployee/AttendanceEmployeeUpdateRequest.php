<?php

namespace Modules\Employee\Http\Requests\AttendanceEmployee;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class AttendanceEmployeeUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'basic_hours' => 'sometimes|required|integer',
            'attendance_device_id' => 'sometimes|required|integer',
            'shift_change' => 'sometimes|required|string|max:255',
        ]);
    }
}
