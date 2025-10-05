<?php

namespace Modules\Payroll\Transformers\PayrollReport;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollReportResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'from_date' => $resource->from_date,
            'to_date' => $resource->to_date,
            'total_incentives' => $resource->total_incentives,
            'total_deductions' => $resource->total_deductions,
            'total_salaries' => $resource->total_salaries,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
