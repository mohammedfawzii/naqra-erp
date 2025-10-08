<?php

namespace Modules\Employee\Http\Requests\EmployeeQualification;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeQualificationUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'country_id' => 'nullable|sometimes|exists:countries,id',
            'city_id' => 'nullable|sometimes|exists:cities,id',
            'university' => 'sometimes|required|string|max:255',
            'college' => 'sometimes|required|string|max:255',
            'qualification' => 'nullable|sometimes|string|max:255',
            'major' => 'nullable|sometimes|string|max:255',
            'degree' => 'sometimes|required|string|max:255',
            'gpa' => 'sometimes|required|string|max:255',
            'graduation_year' => 'sometimes|required|integer',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
