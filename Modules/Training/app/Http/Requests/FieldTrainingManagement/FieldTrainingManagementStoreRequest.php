<?php

namespace Modules\Training\Http\Requests\FieldTrainingManagement;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class FieldTrainingManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'training_description' => 'required|string',
            'training_location' => 'nullable|string|max:255',
            'duration' => 'required|integer',
            'status' => 'required|in:planned,in_progress,completed',
        ]);
    }
}
