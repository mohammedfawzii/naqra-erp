<?php

namespace Modules\Training\Transformers\CourseTracking;

use App\Transformers\BaseResource\BaseResource;

class CourseTrackingResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'course' => $resource->course?->program_name,
            'status' => $resource->status,
            'completion_date' => $resource->completion_date,
            'progress_percentage' => $resource->progress_percentage,
            ],
            $this->timestampsArray()
        );
    }
}
