<?php

namespace Modules\Payroll\Transformers\AttendanceManagement;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceManagementResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
              'attendance_date' => $resource->attendance_date,
            //    'time_in' => $this->timein?->time ?? null,
                'time_out' => $resource->time_out?->time ?? null,
            'work_hours' => $resource->work_hours,
            'overtime_hours' => $resource->overtime_hours,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
