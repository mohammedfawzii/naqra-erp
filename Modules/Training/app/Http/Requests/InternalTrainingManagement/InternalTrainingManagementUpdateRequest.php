<?php

namespace Modules\Training\Http\Requests\InternalTrainingManagement;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class InternalTrainingManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'sometimes|required|integer|exists:courses,id',
            'trainer_name' => 'nullable|sometimes|string|max:255',
            'location' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
