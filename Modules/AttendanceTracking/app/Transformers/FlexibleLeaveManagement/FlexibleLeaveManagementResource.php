<?php

namespace Modules\AttendanceTracking\Transformers\FlexibleLeaveManagement;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class FlexibleLeaveManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'selected_leaves' => $resource->selected_leaves,
            'leave_cost' => $resource->leave_cost,
            'holidaysList' => $resource->holidaysList ? $resource->holidaysList->getTranslation('holiday_type', app()->getLocale()) : null,
            ],
            $this->timestampsArray()
        );
    }
}
