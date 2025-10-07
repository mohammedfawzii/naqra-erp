<?php

namespace Modules\Employee\Http\Requests\BaseInformationEmployee;

use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;

class BaseInformationEmployeeUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'avatar' => 'nullable|sometimes|string|max:255',
            'hire_date' => 'nullable|sometimes|date',
            'job_title' => 'nullable|sometimes|string|max:255',
            'position' => 'nullable|sometimes|string|max:255',
            'department_id' => 'nullable|sometimes|exists:departments,id',
            'start_hire' => 'nullable|sometimes|date',
            'end_hire' => 'nullable|sometimes|date',
            'retirement_date' => 'nullable|sometimes|date',
            'notice_period_id' => 'nullable|sometimes|exists:notice_periods,id',
            'trial_period_id' => 'nullable|sometimes|exists:trial_periods,id',
            'direct_manager_id' => 'nullable|sometimes',
            'holiday_manager_id' => 'nullable|sometimes',
            'salary_manager_id' => 'nullable|sometimes',
            'status' => 'sometimes|required|in:hire,fire,retirement,contract_end',
        ]);
    }
}
