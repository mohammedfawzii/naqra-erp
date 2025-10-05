<?php

namespace Modules\Performance\Http\Requests\Goal;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class GoalStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'goal_name' => 'required|string|max:255',
            'goal_description' => 'nullable|string',
            'goal_measure' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'goal_status' => 'required|in:pending,in_progress,completed,cancelled',
            'goal_priority' => 'required|in:low,medium,high',
        ]);
    }
}
