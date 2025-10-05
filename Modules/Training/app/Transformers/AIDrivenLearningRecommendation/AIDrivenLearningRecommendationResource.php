<?php

namespace Modules\Training\Transformers\AIDrivenLearningRecommendation;

use App\Transformers\BaseResource\BaseResource;

class AIDrivenLearningRecommendationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'recommended_course' => $resource->recommended_course,
            'recommendation_reason' => $resource->recommendation_reason,
            'fit_score' => $resource->fit_score,
            ],
            $this->timestampsArray()
        );
    }
}
