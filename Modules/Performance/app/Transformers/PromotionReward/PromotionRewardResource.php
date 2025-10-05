<?php

namespace Modules\Performance\Transformers\PromotionReward;

use Modules\Performance\Transformers\BaseResource\BaseResource;

class PromotionRewardResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'reward_type' => $resource->reward_type,
            'reward_date' => $resource->reward_date,
            ],
            $this->timestampsArray()
        );
    }
}
