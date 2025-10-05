<?php

namespace Modules\Performance\Http\Requests\PromotionReward;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class PromotionRewardUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'reward_type' => 'nullable|sometimes|string|max:255',
            'reward_date' => 'nullable|sometimes|date',
        ]);
    }
}
