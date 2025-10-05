<?php

namespace Modules\Payroll\Transformers\PayrollManagement;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollManagementResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' => $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
            'payroll_number' => $resource->payroll_number,
            'status' => $resource->status,
            'payroll_date' => $resource->payroll_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
