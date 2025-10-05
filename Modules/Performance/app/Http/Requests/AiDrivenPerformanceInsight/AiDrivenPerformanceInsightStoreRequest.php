<?php

namespace Modules\Performance\Http\Requests\AiDrivenPerformanceInsight;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class AiDrivenPerformanceInsightStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'ai_recommendation' => 'nullable|string',
            'probability_score' => 'nullable|numeric',
            'analysis_date' => 'nullable|date',
        ]);
    }
}
