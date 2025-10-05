<?php

namespace Modules\Payroll\Transformers\PayrollProfile;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollProfileResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
  'employee' => $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
              'payment_date' => $resource->payment_date,
            'payrollAttachments' => $resource->payrollAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
