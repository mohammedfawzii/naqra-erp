<?php

namespace Modules\Payroll\Transformers\BenefitEmployee;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefitEmployeeResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
            'benefitTypes' => $resource->benefitTypes ? $resource->benefitTypes->getTranslation('type', app()->getLocale()) : null,
            'amount' => $resource->amount,
            'start_date' => $resource->start_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
