<?php

namespace Modules\Performance\Transformers\Feedback360;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class Feedback360Resource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'evaluator_name' => $resource->evaluator_name,
            'evaluator_designation' => $resource->evaluator_designation,
            'rating' => $resource->rating,
            'comment' => $resource->comment,
            'source' => $resource->source,
            ],
            $this->timestampsArray()
        );
    }
}
