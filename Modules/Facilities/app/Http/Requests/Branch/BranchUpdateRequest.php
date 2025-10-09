<?php

namespace Modules\Facilities\Http\Requests\Branch;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class BranchUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'facility_id' => 'nullable|sometimes|exists:facilities,id',
            'avatar' => 'nullable|sometimes|string|max:255',
            'unified_national_number' => 'nullable|sometimes|string|max:255',
            'name' => 'nullable|sometimes|array',
            'entity_id' => 'nullable|sometimes|exists:entities,id',
            'company_type_id' => 'nullable|sometimes|exists:company_types,id',
            'company_size_id' => 'nullable|sometimes|exists:company_sizes,id',
            'city_id' => 'nullable|sometimes|exists:cities,id',
            'headquarter_id' => 'nullable|sometimes|exists:headquarters,id',
            'activity_id' => 'nullable|sometimes|exists:activities,id',
            'phone_number' => 'nullable|sometimes|string|max:255',
            'email' => 'nullable|sometimes|string|max:255',
            'website' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
