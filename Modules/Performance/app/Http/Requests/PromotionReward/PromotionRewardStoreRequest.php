<?php

namespace Modules\Performance\Http\Requests\PromotionReward;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class PromotionRewardStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'reward_type' => 'nullable|string|max:255',
            'reward_date' => 'nullable|date',
        ]);
    }
}
