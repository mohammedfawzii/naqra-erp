<?php

namespace Modules\Facilities\Http\Requests\OwnerResident;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerResidentStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'full_name' => 'nullable|string|max:255',
            'resident_id' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'national_address' => 'nullable|string|max:255',
            'investment_license_number' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'partnership_type' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);
    }
}
