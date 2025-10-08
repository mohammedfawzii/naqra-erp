<?php

namespace Modules\Facilities\Http\Requests\Facilities;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class FacilitiesUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'nullable|sometimes|string|max:255',
            'have_branches' => 'sometimes|required|boolean',
            'employee_count' => 'sometimes|required|integer',
            'national_number_alone' => 'nullable|sometimes|string|max:255',
            'status' => 'sometimes|required|in:active,not_active',
            'activity' => 'nullable|sometimes|string|max:255',
            'completion_percentage' => 'sometimes|required|integer',
        ]);
    }
}
