<?php

namespace Modules\Training\Http\Requests\CourseTracking;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class CourseTrackingStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'required|integer|exists:courses,id',
            'status' => 'required|in:not_started,in_progress,completed',
            'completion_date' => 'nullable|date',
            'progress_percentage' => 'required',
        ]);
    }
}
