<?php

namespace Modules\Payroll\Transformers\PaidLeaveManagement;

use Illuminate\Http\Resources\Json\JsonResource;

class PaidLeaveManagementResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
   'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
               'holidaysLists' => $resource->holidaysLists ? $resource->holidaysLists->getTranslation('holiday_type', app()->getLocale()) : null,
            'leave_balance' => $resource->leave_balance,
            'leave_date' => $resource->leave_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
