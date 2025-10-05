<?php

namespace Modules\Payroll\Transformers\MultiCountryPayroll;

use Illuminate\Http\Resources\Json\JsonResource;

class MultiCountryPayrollResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
    'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
                'country' => $resource->country ? $resource->country->getTranslation('name', app()->getLocale()) : null,
            'basic_salary' => $resource->basic_salary,
            'currency' => $resource->currency ? $resource->currency->getTranslation('currency_type', app()->getLocale()) : null,
            'compliance_status' => $resource->compliance_status,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
