<?php

namespace Modules\Training\Http\Requests\ELearningManagement;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class ELearningManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_link' => 'required|string|max:255',
            'progress' => 'required',
            'completion_time' => 'nullable',
        ]);
    }
}
