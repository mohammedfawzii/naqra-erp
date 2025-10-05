<?php

namespace Modules\Payroll\Transformers\ChatbotforPayroll;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatbotforPayrollResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
   'employee' =>  $resource->employee ? $resource->employee->getTranslation('firstName', app()->getLocale()) : null,
               'query_type' => $resource->query_type,
            'date' => $resource->date,
            'query_date' => $resource->query_date,
            'query_status' => $resource->query_status,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
