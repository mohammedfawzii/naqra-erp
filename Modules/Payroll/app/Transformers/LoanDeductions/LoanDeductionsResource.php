<?php

namespace Modules\Payroll\Transformers\LoanDeductions;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanDeductionsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
   'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
               'loanType' => $resource->loanType ? $resource->loanType->getTranslation('type', app()->getLocale()) : null,
            'deduction_percentage' => $resource->deduction_percentage,
            'deduction_amount' => $resource->deduction_amount,
            'start_date' => $resource->start_date,
            'deduction_status' => $resource->deduction_status,
            'end_date' => $resource->end_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
