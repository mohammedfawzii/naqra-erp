<?php

namespace Modules\Employee\Http\Requests\EmployeeContact;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeContactUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'personal_email' => 'nullable|sometimes|string|max:255',
            'company_email' => 'nullable|sometimes|string|max:255',
            'contact_email' => 'nullable|sometimes|string|max:255',
            'mobile_number' => 'nullable|sometimes|string|max:255',
            'mobile_number_two' => 'nullable|sometimes|string|max:255',
            'emergency_contact_name' => 'nullable|sometimes|string|max:255',
            'emergency_contact_phone' => 'nullable|sometimes|string|max:20',
            'job_title' => 'nullable|sometimes|string|max:255',
            'relation' => 'nullable|sometimes|in:father,mother,son,daughter,brother,sister,wife,husband,friend',
            'company_name' => 'nullable|sometimes|string|max:255',
            'company_phone' => 'nullable|sometimes|string|max:20',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
