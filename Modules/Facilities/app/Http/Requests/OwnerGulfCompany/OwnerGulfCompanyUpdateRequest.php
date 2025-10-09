<?php

namespace Modules\Facilities\Http\Requests\OwnerGulfCompany;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerGulfCompanyUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'sometimes|required|exists:owners,id',
            'gulf_commercial_number' => 'nullable|sometimes|string|max:255',
            'name' => 'nullable|sometimes|array',
            'company_type' => 'nullable|sometimes|string|max:255',
            'company_status' => 'nullable|sometimes|string|max:255',
            'company_nationality' => 'nullable|sometimes|string|max:255',
            'email' => 'nullable|sometimes|string|max:255',
            'landline' => 'nullable|sometimes|string|max:255',
            'website' => 'nullable|sometimes|string|max:255',
            'authorized_person' => 'nullable|sometimes|string|max:255',
            'authorized_email' => 'nullable|sometimes|string|max:255',
            'authorized_mobile' => 'nullable|sometimes|string|max:255',
            'unified_phone' => 'nullable|sometimes|string|max:255',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
