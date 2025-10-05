<?php

namespace Modules\Training\Repositories\GamificationForTraining;

use Modules\Training\Repositories\GamificationForTraining\GamificationForTrainingRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\GamificationForTraining;

class GamificationForTrainingRepository extends BaseRepository implements GamificationForTrainingRepositoryInterface
{
    public function __construct(GamificationForTraining $model)
    {
        parent::__construct($model);
    }
}
