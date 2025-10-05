<?php

namespace Modules\AttendanceTracking\Transformers\LeaveRequest;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class LeaveRequestResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'holidaysList' => $resource->holidaysList ? $resource->holidaysList->getTranslation('holiday_type', app()->getLocale()) : null,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'request_status' => $resource->request_status,
            ],
            $this->timestampsArray()
        );
    }
}
