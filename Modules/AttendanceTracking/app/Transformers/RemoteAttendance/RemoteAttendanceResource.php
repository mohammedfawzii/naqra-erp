<?php

namespace Modules\AttendanceTracking\Transformers\RemoteAttendance;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class RemoteAttendanceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'attendance_location' => $resource->attendance_location,
            'remote_check_in_time' => $resource->remote_check_in_time,
            'remote_check_out_time' => $resource->remote_check_out_time,

            ],
            $this->timestampsArray()
        );
    }
}
