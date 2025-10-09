<?php

namespace Modules\Facilities\Http\Requests\OwnerGulf;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerGulfStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'first_name' => 'nullable|array',
            'second_name' => 'nullable|array',
            'third_name' => 'nullable|array',
            'family_name' => 'nullable|array',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'occupation' => 'nullable|string|max:255',
            'nationality_id' => 'nullable|exists:nationalities,id',
            'residency_number' => 'nullable|string|max:255',
            'gulf_national_id' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'saudi_mobile' => 'nullable|string|max:255',
            'foreign_mobile' => 'nullable|string|max:255',
            'saudi_address' => 'nullable|string|max:255',
            'foreign_address' => 'nullable|string|max:255',
            'partnership_type' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);
    }
}
