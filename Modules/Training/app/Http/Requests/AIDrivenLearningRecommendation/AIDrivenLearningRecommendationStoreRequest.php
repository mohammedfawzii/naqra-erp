<?php

namespace Modules\Training\Http\Requests\AIDrivenLearningRecommendation;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class AIDrivenLearningRecommendationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'recommended_course' => 'required|string|max:255',
            'recommendation_reason' => 'nullable|string',
            'fit_score' => 'required',
        ]);
    }
}
