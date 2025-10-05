<?php

namespace Modules\Performance\Transformers\LearningManagementIntegration;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class LearningManagementIntegrationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'learning_platform' => $resource->learning_platform,
            'integration_status' => $resource->integration_status,
            'suggested_course' => $resource->suggested_course,
            ],
            $this->timestampsArray()
        );
    }
}
