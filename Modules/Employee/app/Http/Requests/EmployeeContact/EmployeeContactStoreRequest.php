<?php

namespace Modules\Employee\Http\Requests\EmployeeContact;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeContactStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'personal_email' => 'nullable|string|max:255',
            'company_email' => 'nullable|string|max:255',
            'contact_email' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
            'mobile_number_two' => 'nullable|string|max:255',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'job_title' => 'nullable|string|max:255',
            'relation' => 'nullable|in:father,mother,son,daughter,brother,sister,wife,husband,friend',
            'company_name' => 'nullable|string|max:255',
            'company_phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);
    }
}
