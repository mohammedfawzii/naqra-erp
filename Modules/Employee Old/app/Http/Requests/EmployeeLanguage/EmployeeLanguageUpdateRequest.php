<?php

namespace Modules\Employee\Http\Requests\EmployeeLanguage;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeLanguageUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'language' => 'sometimes|required|string|max:255',
            'writing_level' => 'nullable|sometimes|string|max:255',
            'reading_level' => 'nullable|sometimes|string|max:255',
            'speaking_level' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
