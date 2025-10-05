<?php

namespace Modules\AttendanceTracking\Transformers\EmployeeLeaveSelfService;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class EmployeeLeaveSelfServiceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'holidaysList' => $resource->holidaysList ? $resource->holidaysList->getTranslation('holiday_type', app()->getLocale()) : null,
            'request_status' => $resource->request_status,
             ],
            $this->timestampsArray()
        );
    }
}
