<?php

namespace Modules\Training\Transformers\TrainingEvaluation;

use App\Transformers\BaseResource\BaseResource;

class TrainingEvaluationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'course' => $resource->course?->program_name,
            'rating' => $resource->rating,
            'feedback' => $resource->feedback,
            'satisfaction_level' => $resource->satisfaction_level,
            ],
            $this->timestampsArray()
        );
    }
}
