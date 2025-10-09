<?php

namespace Modules\Facilities\Transformers\SubscriptionFacilities;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 SubscriptionFacilitiesResource
 */
class SubscriptionFacilitiesResource extends BaseMetaResource
{
    public function toArray($request): array
    {
     return $this->mergeWithTimestamps([
            'branch_id' => $this->branch->name,
            'subscription_id' => optional($this->subscription)->getTranslation('subscription_name', app()->getLocale()),
            'subscription_types_id' =>  optional($this->subscriptionTypes)->getTranslation('type', app()->getLocale()),
            'invoice_number' => $this->invoice_number,
            'invoice_value' => $this->invoice_value,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reminder_date' => $this->reminder_date,
            'notes' => $this->notes,
           
        ]);
    }
}
