<?php

namespace Modules\Training\Http\Requests\AIDrivenLearningRecommendation;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class AIDrivenLearningRecommendationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'recommended_course' => 'sometimes|required|string|max:255',
            'recommendation_reason' => 'nullable|sometimes|string',
            'fit_score' => 'sometimes|required',
        ]);
    }
}
