<?php

namespace Modules\Training\Transformers\TrainingNeedsAssessment;

use App\Transformers\BaseResource\BaseResource;

class TrainingNeedsAssessmentResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'needs' => $resource->needs,
            'needs_priority' => $resource->needs_priority,
            'needs_source' => $resource->needs_source,
            ],
            $this->timestampsArray()
        );
    }
}
