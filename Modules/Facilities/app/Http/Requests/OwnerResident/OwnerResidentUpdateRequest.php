<?php

namespace Modules\Facilities\Http\Requests\OwnerResident;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerResidentUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'sometimes|required|exists:owners,id',
            'full_name' => 'nullable|sometimes|string|max:255',
            'resident_id' => 'nullable|sometimes|string|max:255',
            'email' => 'nullable|sometimes|string|max:255',
            'mobile' => 'nullable|sometimes|string|max:255',
            'national_address' => 'nullable|sometimes|string|max:255',
            'investment_license_number' => 'nullable|sometimes|string|max:255',
            'birth_date' => 'nullable|sometimes|date',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
