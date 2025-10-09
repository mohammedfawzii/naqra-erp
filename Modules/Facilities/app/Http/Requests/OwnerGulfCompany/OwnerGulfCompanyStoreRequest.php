<?php

namespace Modules\Facilities\Http\Requests\OwnerGulfCompany;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerGulfCompanyStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'required|exists:owners,id',
            'gulf_commercial_number' => 'nullable|string|max:255',
            'name' => 'nullable|array',
            'company_type' => 'nullable|string|max:255',
            'company_status' => 'nullable|string|max:255',
            'company_nationality' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'landline' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'authorized_person' => 'nullable|string|max:255',
            'authorized_email' => 'nullable|string|max:255',
            'authorized_mobile' => 'nullable|string|max:255',
            'unified_phone' => 'nullable|string|max:255',
            'partnership_type' => 'nullable|string|max:255',
            'partnership_percentage' => 'nullable|integer',
            'note' => 'nullable|string',
        ]);
    }
}
