<?php

namespace Modules\Performance\Transformers\DevelopmentPlan;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class DevelopmentPlanResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'description' => $resource->description,
            'targeted_skills' => $resource->targeted_skills,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'status' => $resource->status,
            ],
            $this->timestampsArray()
        );
    }
}
