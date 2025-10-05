<?php

namespace Modules\Training\Http\Requests\GamificationForTraining;

use App\Http\Requests\BaseRequest\BaseStoreRequest;

class GamificationForTrainingStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'training_points' => 'required',
            'earned_rewards' => 'nullable|string',
            'progress_level' => 'required|string|max:255',
        ]);
    }
}
