<?php

namespace Modules\Performance\Transformers\CompetencyManagement;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class CompetencyManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'competency' => $resource->competency,
            'competency_rating' => $resource->competency_rating,
            'target_competency' => $resource->target_competency,
            ],
            $this->timestampsArray()
        );
    }
}
