<?php

namespace Modules\Performance\Http\Requests\Goal;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class GoalUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'goal_name' => 'sometimes|required|string|max:255',
            'goal_description' => 'nullable|sometimes|string',
            'goal_measure' => 'nullable|sometimes',
            'start_date' => 'nullable|sometimes|date',
            'end_date' => 'nullable|sometimes|date',
            'goal_status' => 'sometimes|required|in:pending,in_progress,completed,cancelled',
            'goal_priority' => 'sometimes|required|in:low,medium,high',
        ]);
    }
}
