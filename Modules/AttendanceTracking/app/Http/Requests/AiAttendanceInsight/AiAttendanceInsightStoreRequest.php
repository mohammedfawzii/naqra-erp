<?php

namespace Modules\AttendanceTracking\Http\Requests\AiAttendanceInsight;

use Modules\AttendanceTracking\Http\Requests\BaseRequest\BaseStoreRequest;

class AiAttendanceInsightStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'ai_recommendation' => 'required|string|max:255',
            'probability_score' => 'required|numeric',
            'analysis_date' => 'required|date',
        ]);
    }
}
