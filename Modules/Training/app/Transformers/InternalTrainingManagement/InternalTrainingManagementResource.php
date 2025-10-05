<?php

namespace Modules\Training\Transformers\InternalTrainingManagement;

use App\Transformers\BaseResource\BaseResource;

class InternalTrainingManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'course' => $resource->course?->program_name,
            'trainer_name' => $resource->trainer_name,
            'location' => $resource->location,
            ],
            $this->timestampsArray()
        );
    }
}
