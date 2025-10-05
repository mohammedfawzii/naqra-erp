<?php

namespace Modules\Training\Http\Requests\InternalTrainingManagement;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class InternalTrainingManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'required|integer|exists:courses,id',
            'trainer_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
    }
}
