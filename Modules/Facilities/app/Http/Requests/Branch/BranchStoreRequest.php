<?php

namespace Modules\Facilities\Http\Requests\Branch;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class BranchStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'facility_id' => 'nullable|exists:facilities,id',
            'avatar' => 'nullable|string|max:255',
            'unified_national_number' => 'nullable|string|max:255',
            'name' => 'nullable|array',
            'entity_id' => 'nullable|exists:entities,id',
            'company_type_id' => 'nullable|exists:company_types,id',
            'company_size_id' => 'nullable|exists:company_sizes,id',
            'city_id' => 'nullable|exists:cities,id',
            'headquarter_id' => 'nullable|exists:headquarters,id',
            'activity_id' => 'nullable|exists:activities,id',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);
    }
}
