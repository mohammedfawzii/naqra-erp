<?php

namespace Modules\Payroll\Transformers\TaxDeduction;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxDeductionResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
            'taxDeductionTypes' => $resource->taxDeductionTypes ? $resource->taxDeductionTypes->getTranslation('type', app()->getLocale()) : null,
            'amount' => $resource->amount,
            'deduction_date' => $resource->deduction_date,
            'taxDeductionStatuses' => $resource->taxDeductionStatuses ? $resource->taxDeductionStatuses->getTranslation('status', app()->getLocale()) : null,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
