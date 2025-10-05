<?php

namespace Modules\Performance\Transformers\EmployeeRecognitionManagement;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class EmployeeRecognitionManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'recognition_type' => $resource->recognition_type,
            'recognition_description' => $resource->recognition_description,
            'recognition_date' => $resource->recognition_date,
            ],
            $this->timestampsArray()
        );
    }
}
