<?php

namespace Modules\AttendanceTracking\Transformers\AttendanceLeaveAnalytics;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class AttendanceLeaveAnalyticsResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
             [
            'time_period' => $resource->time_period,
            'attendance_rate' => $resource->attendance_rate,
            'absence_rate' => $resource->absence_rate,
            'leave_taken_report' => $resource->leave_taken_report,
             'attendanceAttachments' => $this->attendanceAttachments?->file,
            ],
            $this->timestampsArray()
        );
    }
}
