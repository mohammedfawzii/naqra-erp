<?php

namespace Modules\Facilities\Transformers\SubscriptionFacilities;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    Branch,
    Subscription,
    SubscriptionTypes
};

/**
 * 🔹 SubscriptionFacilitiesResourceEnums
 */
class SubscriptionFacilitiesResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'branch' => $this->enum(Branch::class, 'facility_id'),
            'subscription' => $this->enum(Subscription::class, 'subscription_name'),
            'subscriptionTypes' => $this->enum(SubscriptionTypes::class, 'type'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
