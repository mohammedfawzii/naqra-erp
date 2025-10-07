<?php

namespace Modules\Employee\Http\Requests\EmployeeDebendent;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeDebendentUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'full_name' => 'nullable|sometimes|array',
            'relationship' => 'nullable|sometimes|in:son,daughter,wife,husband,father,mother,brother,sister',
            'birth_date' => 'nullable|sometimes|date',
            'birth_place' => 'nullable|sometimes|string|max:255',
            'nationality_id' => 'nullable|sometimes|exists:nationalities,id',
            'gender' => 'nullable|sometimes|in:male,female',
            'national_id_number' => 'nullable|sometimes|string|max:255',
            'id_issue_date' => 'nullable|sometimes|date',
            'id_expiry_date' => 'nullable|sometimes|date',
            'mobile_number' => 'nullable|sometimes|string|max:255',
            'passport_number' => 'nullable|sometimes|string|max:255',
            'passport_issue_date' => 'nullable|sometimes|date',
            'passport_expiry_date' => 'nullable|sometimes|date',
            'passport_issue_place' => 'nullable|sometimes|string|max:255',
            'health_status' => 'nullable|sometimes|string|max:255',
            'medical_test_status' => 'nullable|sometimes|string|max:255',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
