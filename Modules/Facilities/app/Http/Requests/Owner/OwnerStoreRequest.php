<?php

namespace Modules\Facilities\Http\Requests\Owner;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class OwnerStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            // 'facility_id' => 'nullable|exists:facilities,id',
            'owner_type' => 'required|in:association,foreign_company,saudi_individual,gulf_individual,resident_individual,saudi_company,gulf_company,endowment',
        ]);
    }
}
