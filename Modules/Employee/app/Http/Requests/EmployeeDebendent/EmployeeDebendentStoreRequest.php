<?php

namespace Modules\Employee\Http\Requests\EmployeeDebendent;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeDebendentStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'full_name' => 'required|string',
            'relationship' => 'required|in:son,daughter,wife,husband,father,mother,brother,sister',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'nationality_id' => 'required|exists:nationalities,id',
            'gender' => 'required|in:male,female',
            'national_id_number' => 'required|string|max:255',
            'id_issue_date' => 'required|date',
            'id_expiry_date' => 'required|date',
            'mobile_number' => 'required|string|max:255',
            'passport_number' => 'required|string|max:255',
            'passport_issue_date' => 'required|date',
            'passport_expiry_date' => 'required|date',
            'passport_issue_place' => 'required|string|max:255',
            'health_status' => 'required|string|max:255',
            'medical_test_status' => 'required|string|max:255',
            'notes' => 'required|string',
        ]);
    }
}
