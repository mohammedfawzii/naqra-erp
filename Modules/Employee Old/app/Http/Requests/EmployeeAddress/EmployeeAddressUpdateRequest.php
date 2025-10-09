<?php

namespace Modules\Employee\Http\Requests\EmployeeAddress;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeAddressUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'type' => 'sometimes|required|in:current,permanent',
            'country_id' => 'nullable|sometimes|exists:countries,id',
            'city_id' => 'nullable|sometimes|exists:cities,id',
            'neighborhood' => 'nullable|sometimes|string|max:255',
            'street' => 'nullable|sometimes|string|max:255',
            'building_number' => 'nullable|sometimes|string|max:255',
            'building_type' => 'nullable|sometimes|string|max:255',
            'building_name' => 'nullable|sometimes|string|max:255',
            'postal_code' => 'nullable|sometimes|string|max:255',
            'po_box' => 'nullable|sometimes|string|max:255',
            'notes' => 'nullable|sometimes|string',
            'same_address' => 'sometimes|required|boolean',
        ]);
    }
}
