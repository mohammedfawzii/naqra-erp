<?php

namespace Modules\Training\Http\Requests\FieldTrainingManagement;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class FieldTrainingManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'training_description' => 'sometimes|required|string',
            'training_location' => 'nullable|sometimes|string|max:255',
            'duration' => 'sometimes|required|integer',
            'status' => 'sometimes|required|in:planned,in_progress,completed',
        ]);
    }
}
