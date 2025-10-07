<?php

namespace Modules\Employee\Http\Requests\EmployeeAddress;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeAddressStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'type' => 'required|in:current,permanent',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'neighborhood' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'building_number' => 'required|string|max:255',
            'building_type' => 'required|string|max:255',
            'building_name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'po_box' => 'required|string|max:255',
            'notes' => 'required|string',
            'same_address' => 'required|boolean',
        ]);
    }
}
