<?php

namespace Modules\Payroll\Transformers\Payroll;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'employee' => $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
            'basic_salary' => $resource->basic_salary,
            'allowances' => $resource->allowances,
            'overtime_hours' => $resource->overtime_hours,
            'overtime_amount' => $resource->overtime_amount,
            'deductions' => $resource->deductions,
            'gross_salary' => $resource->gross_salary,
            'net_salary' => $resource->net_salary,
            'paymentMethod' => $resource->paymentMethod ? $resource->paymentMethod->getTranslation('name', app()->getLocale()) : null,
            'currency' => $resource->currency ? $resource->currency->getTranslation('currency_type', app()->getLocale()) : null,
            'payment_date' => $resource->payment_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
