<?php

namespace Modules\Employee\Http\Requests\PersonalInformationEmployee;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class PersonalInformationEmployeeStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'first_name' => 'nullable|array',
            'second_name' => 'nullable|array',
            'therd_name' => 'nullable|array',
            'family_name' => 'nullable|array',
            'nationality_id' => 'nullable|exists:nationalities,id',
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'marriage_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'birth_date' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'national_id_number' => 'nullable|string|max:255',
            'national_id_expiry' => 'nullable|date',
            'religion_id' => 'nullable|exists:religions,id',
            'passport_type' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:255',
            'passport_issue_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date',
            'passport_issue_place' => 'nullable|string|max:255',
            'passport_validity' => 'nullable|string|max:255',
            'work_card_number' => 'nullable|string|max:255',
            'work_card_issue_date' => 'nullable|date',
            'work_card_expiry_date' => 'nullable|date',
            'work_card_fee' => 'nullable|string|max:255',
            'iqama_number' => 'nullable|string|max:255',
            'iqama_issue_date' => 'nullable|date',
            'iqama_expiry_date' => 'nullable|date',
            'iqama_fee' => 'nullable|string|max:255',
            'document_type' => 'nullable|string|max:255',
        ]);
    }
}
