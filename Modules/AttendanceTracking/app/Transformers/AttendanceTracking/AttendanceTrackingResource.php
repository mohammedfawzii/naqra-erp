<?php

namespace Modules\AttendanceTracking\Transformers\AttendanceTracking;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class AttendanceTrackingResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'attendance_date' => $resource->attendance_date,
            'attendance_type' => $resource->attendance_type,
            'check_in_time' => $resource->check_in_time,
            'check_out_time' => $resource->check_out_time,
            'overtime_hours' => $resource->overtime_hours,
            'working_hours' => $resource->working_hours,
            ],
            $this->timestampsArray()
        );
    }
}
