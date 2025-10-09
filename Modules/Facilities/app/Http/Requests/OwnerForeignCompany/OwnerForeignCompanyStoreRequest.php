<?php

namespace Modules\Facilities\Http\Requests\OwnerForeignCompany;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerForeignCompanyStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'company_name' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'email' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'authorized_person' => 'nullable|string|max:255',
            'authorized_email' => 'nullable|string|max:255',
            'authorized_mobile' => 'nullable|string|max:255',
            'landline' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'partnership_type' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);
    }
}
