<?php

namespace Modules\Payroll\Transformers\TaxDeductionStatus;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxDeductionStatusResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'status' => $resource->getTranslation('status', app()->getLocale()),
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
