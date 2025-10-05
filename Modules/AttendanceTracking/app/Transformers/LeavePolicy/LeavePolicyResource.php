<?php

namespace Modules\AttendanceTracking\Transformers\LeavePolicy;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class LeavePolicyResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
             [
            'holidaysList' => $resource->holidaysList ? $resource->holidaysList->getTranslation('holiday_type', app()->getLocale()) : null,
            'policy_description' => $resource->policy_description,
            'annual_balance' => $resource->annual_balance,
             'attendanceAttachments' => $this->attendanceAttachments?->file,
            ],
            $this->timestampsArray()
        );
    }
}
