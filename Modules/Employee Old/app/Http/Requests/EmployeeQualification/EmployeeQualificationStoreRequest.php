<?php

namespace Modules\Employee\Http\Requests\EmployeeQualification;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeQualificationStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'university' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'degree' => 'required|string|max:255',
            'gpa' => 'required|string|max:255',
            'graduation_year' => 'required|integer',
            'notes' => 'nullable|string',
        ]);
    }
}
