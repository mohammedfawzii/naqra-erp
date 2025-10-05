<?php

namespace Modules\Performance\Http\Requests\AiDrivenPerformanceInsight;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class AiDrivenPerformanceInsightUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'ai_recommendation' => 'nullable|sometimes|string',
            'probability_score' => 'nullable|sometimes|numeric',
            'analysis_date' => 'nullable|sometimes|date',
        ]);
    }
}
