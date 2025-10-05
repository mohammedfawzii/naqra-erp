<?php

namespace Modules\AttendanceTracking\Transformers\AiAttendanceInsight;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class AiAttendanceInsightResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'ai_recommendation' => $resource->ai_recommendation,
            'probability_score' => $resource->probability_score,
            'analysis_date' => $resource->analysis_date,
             ],
            $this->timestampsArray()
        );
    }
}
