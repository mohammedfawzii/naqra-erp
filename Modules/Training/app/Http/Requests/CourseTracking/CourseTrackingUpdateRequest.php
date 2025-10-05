<?php

namespace Modules\Training\Http\Requests\CourseTracking;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class CourseTrackingUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'course_id' => 'sometimes|required|integer|exists:courses,id',
            'status' => 'sometimes|required|in:not_started,in_progress,completed',
            'completion_date' => 'nullable|sometimes|date',
            'progress_percentage' => 'sometimes|required',
        ]);
    }
}
