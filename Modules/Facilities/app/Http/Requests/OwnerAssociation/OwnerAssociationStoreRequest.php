<?php

namespace Modules\Facilities\Http\Requests\OwnerAssociation;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerAssociationStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'association_name' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'establishment_date' => 'nullable|date',
            'license_expiry_date' => 'nullable|date',
            'email' => 'nullable|string|max:255',
            'national_address' => 'nullable|string|max:255',
            'authorized_person' => 'nullable|string|max:255',
            'authorized_email' => 'nullable|string|max:255',
            'authorized_mobile' => 'nullable|string|max:255',
            'landline' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'partnership_type' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);
    }
}
