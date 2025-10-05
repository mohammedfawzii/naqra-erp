<?php

namespace Modules\Facilities\Transformers\periodicObligations;

use Illuminate\Http\Resources\Json\JsonResource;

class periodicObligationsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'zakat_due_date' => $resource->zakat_due_date,
            'zakat_reminder_date' => $resource->zakat_reminder_date,
            'tax_declaration_due_date' => $resource->tax_declaration_due_date,
            'tax_declaration_reminder_date' => $resource->tax_declaration_reminder_date,
            'salary_due_date' => $resource->salary_due_date,
            'salary_reminder_date' => $resource->salary_reminder_date,
            'facilityAttachments' => $resource->facilityAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
