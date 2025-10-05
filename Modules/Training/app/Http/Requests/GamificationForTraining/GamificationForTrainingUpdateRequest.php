<?php

namespace Modules\Training\Http\Requests\GamificationForTraining;

use App\Http\Requests\BaseRequest\BaseUpdateRequest;

class GamificationForTrainingUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'training_points' => 'sometimes|required',
            'earned_rewards' => 'nullable|sometimes|string',
            'progress_level' => 'sometimes|required|string|max:255',
        ]);
    }
}
