<?php

namespace Modules\Performance\Http\Requests\EmployeeRecognitionManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class EmployeeRecognitionManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'recognition_type' => 'sometimes|required|string|max:255',
            'recognition_description' => 'nullable|sometimes|string',
            'recognition_date' => 'nullable|sometimes|date',
        ]);
    }
}
