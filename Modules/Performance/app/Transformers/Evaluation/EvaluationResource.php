<?php

namespace Modules\Performance\Transformers\Evaluation;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class EvaluationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'evaluation_date' => $resource->evaluation_date,
            'rating' => $resource->rating,
            'comments' => $resource->comments,
            'competencies' => $resource->competencies,
            ],
            $this->timestampsArray()
        );
    }
}
