<?php

namespace Modules\Facilities\Http\Requests\OwnerGulf;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerGulfUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'nullable|sometimes|exists:owners,id',
            'first_name' => 'nullable|sometimes|array',
            'second_name' => 'nullable|sometimes|array',
            'third_name' => 'nullable|sometimes|array',
            'family_name' => 'nullable|sometimes|array',
            'gender' => 'sometimes|required|in:male,female',
            'birth_date' => 'nullable|sometimes|date',
            'occupation' => 'nullable|sometimes|string|max:255',
            'nationality_id' => 'nullable|sometimes|exists:nationalities,id',
            'residency_number' => 'nullable|sometimes|string|max:255',
            'gulf_national_id' => 'nullable|sometimes|string|max:255',
            'email' => 'nullable|sometimes|string|max:255',
            'saudi_mobile' => 'nullable|sometimes|string|max:255',
            'foreign_mobile' => 'nullable|sometimes|string|max:255',
            'saudi_address' => 'nullable|sometimes|string|max:255',
            'foreign_address' => 'nullable|sometimes|string|max:255',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
