<?php

namespace Modules\Performance\Transformers\Goal;

use Illuminate\Http\Resources\Json\JsonResource;

class GoalResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'goal_status' => [
                    [ 'label' => 'Pending', 'value' => 'pending' ],
                    [ 'label' => 'In progress', 'value' => 'in_progress' ],
                    [ 'label' => 'Completed', 'value' => 'completed' ],
                    [ 'label' => 'Cancelled', 'value' => 'cancelled' ]
                ],
                'goal_priority' => [
                    [ 'label' => 'Low', 'value' => 'low' ],
                    [ 'label' => 'Medium', 'value' => 'medium' ],
                    [ 'label' => 'High', 'value' => 'high' ]
                ],

        ];
    }
}
