<?php

namespace Modules\Facilities\Http\Requests\Facilities;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class FacilitiesStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'nullable|string|max:255',
            'have_branches' => 'required|boolean',
            // 'employee_count' => 'required|integer',
            // 'national_number_alone' => 'nullable|string|max:255',
            // 'status' => 'required|in:active,not_active',
            // 'activity' => 'nullable|string|max:255',
            // 'completion_percentage' => 'required|integer',
        ]);
    }
}
