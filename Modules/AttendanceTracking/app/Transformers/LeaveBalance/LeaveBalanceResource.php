<?php

namespace Modules\AttendanceTracking\Transformers\LeaveBalance;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class LeaveBalanceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'holidaysList' => $resource->holidaysList ? $resource->holidaysList->getTranslation('holiday_type', app()->getLocale()) : null,
            'available_balance' => $resource->available_balance,
            'used_balance' => $resource->used_balance,
             ],
            $this->timestampsArray()
        );
    }
}
