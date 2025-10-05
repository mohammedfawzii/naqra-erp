<?php

namespace Modules\Payroll\Transformers\PayrollAnalytics;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollAnalyticsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'total_salary' => $resource->total_salary,
            'predicted_cost' => $resource->predicted_cost,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
