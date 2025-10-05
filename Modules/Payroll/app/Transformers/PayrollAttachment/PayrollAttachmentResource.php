<?php

namespace Modules\Payroll\Transformers\PayrollAttachment;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollAttachmentResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [

            'id' => $resource->reference_number,

        ];
    }
}
