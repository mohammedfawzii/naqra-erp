<?php

namespace Modules\Performance\Transformers\SuccessionPlanning;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class SuccessionPlanningResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'position' => $resource->position ? $resource->position->getTranslation('position_name', app()->getLocale()) : null,
            'readiness_rating' => $resource->readiness_rating,
            'development_plan' => $resource->development_plan,
            ],
            $this->timestampsArray()
        );
    }
}
