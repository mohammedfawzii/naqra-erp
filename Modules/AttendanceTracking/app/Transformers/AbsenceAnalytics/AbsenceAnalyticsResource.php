<?php

namespace Modules\AttendanceTracking\Transformers\AbsenceAnalytics;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class AbsenceAnalyticsResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
             [
            'time_period' => $resource->time_period,
            'absence_rate' => $resource->absence_rate,
            'absence_reason' => $resource->absence_reason,
             'attendanceAttachments' => $this->attendanceAttachments?->file,
            ],
            $this->timestampsArray()
        );
    }
}
