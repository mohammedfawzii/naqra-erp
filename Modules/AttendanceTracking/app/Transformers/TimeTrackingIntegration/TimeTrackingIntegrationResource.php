<?php

namespace Modules\AttendanceTracking\Transformers\TimeTrackingIntegration;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class TimeTrackingIntegrationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
             [
            'system_name' => $resource->system_name,
            'integration_type' => $resource->integration_type,
            'integration_status' => $resource->integration_status,
                         'attendanceAttachments' => $this->attendanceAttachments?->file,

            ],
            $this->timestampsArray()
        );
    }
}
