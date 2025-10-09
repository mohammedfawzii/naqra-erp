<?php

namespace Modules\Facilities\Http\Requests\Owner;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class OwnerUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            // 'facility_id' => 'nullable|sometimes|exists:facilities,id',
            'owner_type' => 'nullable|sometimes|in:association,foreign_company,saudi_individual,gulf_individual,resident_individual,saudi_company,gulf_company,endowment',
        ]);
    }
}
