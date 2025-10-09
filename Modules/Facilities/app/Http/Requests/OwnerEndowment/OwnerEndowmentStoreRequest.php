<?php

namespace Modules\Facilities\Http\Requests\OwnerEndowment;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerEndowmentStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'endowment_name' => 'nullable|string|max:255',
            'endowment_national_number' => 'nullable|string|max:255',
            'approval_date' => 'nullable|date',
            'authorized_person' => 'nullable|string|max:255',
            'authorized_mobile' => 'nullable|string|max:255',
            'authorized_email' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'partnership_type' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);
    }
}
