<?php

namespace Modules\Facilities\Http\Requests\SubscriptionFacilities;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class SubscriptionFacilitiesStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'branch_id' => 'nullable|exists:branches,id',
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'subscription_types_id' => 'required|integer|exists:subscription_types,id',
            'invoice_number' => 'required|string|max:255',
            'invoice_value' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reminder_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);
    }
}
