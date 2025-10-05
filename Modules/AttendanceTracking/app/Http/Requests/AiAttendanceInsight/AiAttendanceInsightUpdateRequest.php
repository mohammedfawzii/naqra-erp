<?php

namespace Modules\AttendanceTracking\Http\Requests\AiAttendanceInsight;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseUpdateRequest;

class AiAttendanceInsightUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'ai_recommendation' => 'sometimes|required|string|max:255',
            'probability_score' => 'sometimes|required|numeric',
            'analysis_date' => 'sometimes|required|date',
        ]);
    }
}
