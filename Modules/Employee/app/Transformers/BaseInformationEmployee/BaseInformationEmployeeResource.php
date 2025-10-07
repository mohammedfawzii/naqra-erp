<?php

namespace Modules\Employee\Transformers\BaseInformationEmployee;

use Modules\Employee\Transformers\BaseResource\BaseResource;

class BaseInformationEmployeeResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'avatar' => $resource->avatar,
            'hire_date' => $resource->hire_date,
            'job_title' => $resource->job_title,
            'position' => $resource->position,
            'department' => $resource->department ? $resource->department->getTranslation('name', app()->getLocale()) : null,
            'start_hire' => $resource->start_hire,
            'end_hire' => $resource->end_hire,
            'retirement_date' => $resource->retirement_date,
            'noticePeriod' => $resource->noticePeriod ? $resource->noticePeriod->getTranslation('period_name', app()->getLocale()) : null,
            'trialPeriod' => $resource->trialPeriod ? $resource->trialPeriod->getTranslation('period_long', app()->getLocale()) : null,
            'directManager' => null,
            'holidayManager' => null,
            'salaryManager' => null,
            'status' => $resource->status,
            ],
            $this->timestampsArray()
        );
    }
}
