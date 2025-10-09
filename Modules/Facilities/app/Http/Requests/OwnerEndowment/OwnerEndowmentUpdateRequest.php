<?php

namespace Modules\Facilities\Http\Requests\OwnerEndowment;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerEndowmentUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'sometimes|required|exists:owners,id',
            'endowment_name' => 'nullable|sometimes|string|max:255',
            'endowment_national_number' => 'nullable|sometimes|string|max:255',
            'approval_date' => 'nullable|sometimes|date',
            'authorized_person' => 'nullable|sometimes|string|max:255',
            'authorized_mobile' => 'nullable|sometimes|string|max:255',
            'authorized_email' => 'nullable|sometimes|string|max:255',
            'address' => 'nullable|sometimes|string|max:255',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
