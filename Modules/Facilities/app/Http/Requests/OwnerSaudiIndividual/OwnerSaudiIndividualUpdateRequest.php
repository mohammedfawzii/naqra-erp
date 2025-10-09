<?php

namespace Modules\Facilities\Http\Requests\OwnerSaudiIndividual;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerSaudiIndividualUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'owner_id' => 'sometimes|required|exists:owners,id',
            'name' => 'nullable|sometimes|string|max:255',
            'national_id' => 'nullable|sometimes|string|max:255',
            'email' => 'nullable|sometimes|string|max:255',
            'mobile' => 'nullable|sometimes|string|max:255',
            'national_address' => 'nullable|sometimes|string|max:255',
            'birth_date' => 'nullable|sometimes|date',
            'occupation' => 'nullable|sometimes|string|max:255',
            'partnership_percentage' => 'nullable|sometimes|integer',
            'partnership_type' => 'nullable|sometimes|string|max:255',
            'note' => 'nullable|sometimes|string',
        ]);
    }
}
