<?php

namespace Modules\Employee\Http\Requests\PersonalInformationEmployee;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class PersonalInformationEmployeeUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'first_name' => 'nullable|sometimes|array',
            'second_name' => 'nullable|sometimes|array',
            'therd_name' => 'nullable|sometimes|array',
            'family_name' => 'nullable|sometimes|array',
            'nationality_id' => 'nullable|sometimes|exists:nationalities,id',
            'marital_status' => 'nullable|sometimes|in:single,married,divorced,widowed',
            'marriage_date' => 'nullable|sometimes|date',
            'gender' => 'nullable|sometimes|in:male,female',
            'birth_date' => 'nullable|sometimes|date',
            'place_of_birth' => 'nullable|sometimes|string|max:255',
            'national_id_number' => 'nullable|sometimes|string|max:255',
            'national_id_expiry' => 'nullable|sometimes|date',
            'religion_id' => 'nullable|sometimes|exists:religions,id',
            'passport_type' => 'nullable|sometimes|string|max:255',
            'passport_number' => 'nullable|sometimes|string|max:255',
            'passport_issue_date' => 'nullable|sometimes|date',
            'passport_expiry_date' => 'nullable|sometimes|date',
            'passport_issue_place' => 'nullable|sometimes|string|max:255',
            'passport_validity' => 'nullable|sometimes|string|max:255',
            'work_card_number' => 'nullable|sometimes|string|max:255',
            'work_card_issue_date' => 'nullable|sometimes|date',
            'work_card_expiry_date' => 'nullable|sometimes|date',
            'work_card_fee' => 'nullable|sometimes|string|max:255',
            'iqama_number' => 'nullable|sometimes|string|max:255',
            'iqama_issue_date' => 'nullable|sometimes|date',
            'iqama_expiry_date' => 'nullable|sometimes|date',
            'iqama_fee' => 'nullable|sometimes|string|max:255',
            'document_type' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
