<?php

namespace Modules\Facilities\Transformers\SubscriptionFacilities;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionFacilitiesResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'subscription' => $resource->subscription ? $resource->subscription->getTranslation('subscription_name', app()->getLocale()) : null,
            'subscriptionTypes' => $resource->subscriptionTypes ? $resource->subscriptionTypes->getTranslation('type', app()->getLocale()) : null,
            'invoice_number' => $resource->invoice_number,
            'invoice_value' => $resource->invoice_value,
            'start_date' => $resource->start_date,
            'end_date' => $resource->end_date,
            'reminder_date' => $resource->reminder_date,
            'notes' => $resource->notes,
            'facilityAttachments' => $resource->facilityAttachments?->file,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }
}
