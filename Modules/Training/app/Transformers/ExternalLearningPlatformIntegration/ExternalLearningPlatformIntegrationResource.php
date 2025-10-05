<?php

namespace Modules\Training\Transformers\ExternalLearningPlatformIntegration;

use App\Transformers\BaseResource\BaseResource;

class ExternalLearningPlatformIntegrationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'platform_name' => $resource->platform_name,
            'integration_status' => $resource->integration_status,
            'last_sync_date' => $resource->last_sync_date,
            ],
            $this->timestampsArray()
        );
    }
}
