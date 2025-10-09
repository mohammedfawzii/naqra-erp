<?php

namespace Modules\Facilities\Http\Requests\OwnerForeignCompany;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerForeignCompanyUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'sometimes|required|exists:owners,id',
            'company_name' => 'nullable|sometimes|string|max:255',
            'license_number' => 'nullable|sometimes|string|max:255',
            'issue_date' => 'nullable|sometimes|date',
            'email' => 'nullable|sometimes|string|max:255',
            'mobile' => 'nullable|sometimes|string|max:255',
            'address' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'authorized_person' => 'nullable|sometimes|string|max:255',
            'authorized_email' => 'nullable|sometimes|string|max:255',
            'authorized_mobile' => 'nullable|sometimes|string|max:255',
            'landline' => 'nullable|sometimes|string|max:255',
            'website' => 'nullable|sometimes|string|max:255',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
