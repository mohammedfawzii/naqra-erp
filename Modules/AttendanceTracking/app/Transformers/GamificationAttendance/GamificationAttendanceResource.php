<?php

namespace Modules\AttendanceTracking\Transformers\GamificationAttendance;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class GamificationAttendanceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'attendance_points' => $resource->attendance_points,
            'earned_rewards' => $resource->earned_rewards,
            'progress_level' => $resource->progress_level,
             ],
            $this->timestampsArray()
        );
    }
}
