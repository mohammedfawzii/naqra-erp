<?php

namespace Modules\Facilities\Http\Requests\OwnerSaudiIndividual;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerSaudiIndividualStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'name' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'national_address' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'occupation' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'partnership_type' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);
    }
}
