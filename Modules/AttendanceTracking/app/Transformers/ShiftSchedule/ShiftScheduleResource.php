<?php

namespace Modules\AttendanceTracking\Transformers\ShiftSchedule;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class ShiftScheduleResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'shift_type' => $resource->shift_type,
            'shift_date' => $resource->shift_date,
            'start_time' => $resource->start_time,
            'end_time' => $resource->end_time,
            ],
            $this->timestampsArray()
        );
    }
}
