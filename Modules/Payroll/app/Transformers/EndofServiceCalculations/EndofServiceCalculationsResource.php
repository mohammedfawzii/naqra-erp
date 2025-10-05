<?php

namespace Modules\Payroll\Transformers\EndofServiceCalculations;

use Illuminate\Http\Resources\Json\JsonResource;

class EndofServiceCalculationsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
     'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,            'service_duration' => $resource->service_duration,
            'end_of_service_amount' => $resource->end_of_service_amount,
            'end_date' => $resource->end_date,
            'calculation_status' => $resource->calculation_status,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
