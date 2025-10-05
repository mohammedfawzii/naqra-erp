<?php

namespace Modules\Performance\Transformers\Goal;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class GoalResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
             'goal_name' => $resource->goal_name,
            'goal_description' => $resource->goal_description,
            'goal_measure' => $resource->goal_measure,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'goal_status' => $resource->goal_status,
            'goal_priority' => $resource->goal_priority,
            ],
            $this->timestampsArray()
        );
    }
}
