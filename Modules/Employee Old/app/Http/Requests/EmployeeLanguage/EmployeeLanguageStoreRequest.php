<?php

namespace Modules\Employee\Http\Requests\EmployeeLanguage;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeLanguageStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'language' => 'required|string|max:255',
            'writing_level' => 'required|string|max:255',
            'reading_level' => 'required|string|max:255',
            'speaking_level' => 'required|string|max:255',
        ]);
    }
}
