<?php

namespace Modules\Facilities\Http\Requests\SubscriptionFacilities;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class SubscriptionFacilitiesUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'branch_id' => 'nullable|sometimes|exists:branches,id',
            'subscription_id' => 'sometimes|required|integer|exists:subscriptions,id',
            'subscription_types_id' => 'sometimes|required|integer|exists:subscription_types,id',
            'invoice_number' => 'sometimes|required|string|max:255',
            'invoice_value' => 'sometimes|required|string|max:255',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
            'reminder_date' => 'nullable|sometimes|date',
            'notes' => 'nullable|sometimes|string',
        ]);
    }
}
