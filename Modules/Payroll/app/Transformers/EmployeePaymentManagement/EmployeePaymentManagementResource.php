<?php

namespace Modules\Payroll\Transformers\EmployeePaymentManagement;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeePaymentManagementResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
  'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
              'bank' => $resource->bank ? $resource->bank->getTranslation('name', app()->getLocale()) : null,
            'paymentMethod' => $resource->paymentMethod ? $resource->paymentMethod->getTranslation('name', app()->getLocale()) : null,
            'bank_account_number' => $resource->bank_account_number,
            'iban' => $resource->iban,
            'payroll_date' => $resource->payroll_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
