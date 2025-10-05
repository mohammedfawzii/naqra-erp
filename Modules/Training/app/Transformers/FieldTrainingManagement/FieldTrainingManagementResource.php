<?php

namespace Modules\Training\Transformers\FieldTrainingManagement;

use App\Transformers\BaseResource\BaseResource;

class FieldTrainingManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'training_description' => $resource->training_description,
            'training_location' => $resource->training_location,
            'duration' => $resource->duration,
            'status' => $resource->status,
            ],
            $this->timestampsArray()
        );
    }
}
