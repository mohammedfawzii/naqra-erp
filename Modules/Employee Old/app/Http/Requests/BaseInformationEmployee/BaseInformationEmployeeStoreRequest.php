<?php

namespace Modules\Employee\Http\Requests\BaseInformationEmployee;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;

class BaseInformationEmployeeStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'avatar' => 'nullable|string|max:255',
            'hire_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'start_hire' => 'required|date',
            'end_hire' => 'required|date',
            'retirement_date' => 'required|date',
            'notice_period_id' => 'required|exists:notice_periods,id',
            'trial_period_id' => 'required|exists:trial_periods,id',
            'direct_manager_id' => 'nullable',
            'holiday_manager_id' => 'nullable',
            'salary_manager_id' => 'nullable',
            'status' => 'required|in:hire,fire,retirement,contract_end',
        ]);
    }
}
