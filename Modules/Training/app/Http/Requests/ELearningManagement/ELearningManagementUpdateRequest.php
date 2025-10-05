<?php

namespace Modules\Training\Http\Requests\ELearningManagement;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class ELearningManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_link' => 'sometimes|required|string|max:255',
            'progress' => 'sometimes|required',
            'completion_time' => 'nullable|sometimes',
        ]);
    }
}
