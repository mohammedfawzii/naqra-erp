<?php

namespace Modules\Performance\Transformers\ContinuousPerformanceManagement;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class ContinuousPerformanceManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'activity' => $resource->activity ? $resource->activity->getTranslation('activity', app()->getLocale()) : null,
            'activity_date' => $resource->activity_date,
            'ongoing_rating' => $resource->ongoing_rating,
            'description' => $resource->description,
            ],
            $this->timestampsArray()
        );
    }
}
