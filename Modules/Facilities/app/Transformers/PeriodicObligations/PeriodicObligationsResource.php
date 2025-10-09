<?php

namespace Modules\Facilities\Transformers\PeriodicObligations;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 PeriodicObligationsResource
 */
class PeriodicObligationsResource extends BaseMetaResource
{
    public function toArray($request): array
    {
            return $this->mergeWithTimestamps([
            'facility_id' => $this->facility_id,
            'zakat_due_date' => $this->zakat_due_date,
            'zakat_reminder_date' => $this->zakat_reminder_date,
            'tax_declaration_due_date' => $this->tax_declaration_due_date,
            'tax_declaration_reminder_date' => $this->tax_declaration_reminder_date,
            'salary_due_date' => $this->salary_due_date,
            'salary_reminder_date' => $this->salary_reminder_date,
        ]);
    }
}
