<?php

namespace Modules\Training\Transformers\GamificationForTraining;

use App\Transformers\BaseResource\BaseResource;

class GamificationForTrainingResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'training_points' => $resource->training_points,
            'earned_rewards' => $resource->earned_rewards,
            'progress_level' => $resource->progress_level,
            ],
            $this->timestampsArray()
        );
    }
}
