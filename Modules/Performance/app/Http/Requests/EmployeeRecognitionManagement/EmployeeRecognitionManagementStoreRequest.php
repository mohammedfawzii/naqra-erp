<?php

namespace Modules\Performance\Http\Requests\EmployeeRecognitionManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class EmployeeRecognitionManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'recognition_type' => 'required|string|max:255',
            'recognition_description' => 'nullable|string',
            'recognition_date' => 'nullable|date',
        ]);
    }
}
