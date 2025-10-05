<?php

namespace Modules\Training\Transformers\ELearningManagement;

use App\Transformers\BaseResource\BaseResource;

class ELearningManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'course_link' => $resource->course_link,
            'progress' => $resource->progress,
            'completion_time' => $resource->completion_time,
            ],
            $this->timestampsArray()
        );
    }
}
