<?php

namespace Modules\AttendanceTracking\Transformers\AttendanceCompliance;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class AttendanceComplianceResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(

            [
            'compliance_type' => $resource->compliance_type,
            'compliance_status' => $resource->compliance_status,
            'review_date' => $resource->review_date,
             'attendanceAttachments' => $this->attendanceAttachments?->file,
            ],
            $this->timestampsArray()
        );
    }
}
