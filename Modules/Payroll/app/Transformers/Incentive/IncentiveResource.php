<?php

namespace Modules\Payroll\Transformers\Incentive;

use Illuminate\Http\Resources\Json\JsonResource;

class IncentiveResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
            'incentiveTypes' => $resource->incentiveTypes ? $resource->incentiveTypes->getTranslation('type', app()->getLocale()) : null,
            'amount' => $resource->amount,
            'issue_date' => $resource->issue_date,
            'incentiveStatus' => $resource->incentiveStatus ? $resource->incentiveStatus->getTranslation('status', app()->getLocale()) : null,
             'performance_rating' => $resource->performance_rating,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
