<?php

namespace Modules\Performance\Repositories\Goal;

use Modules\Performance\Repositories\Goal\GoalRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\Goal;

class GoalRepository extends BaseRepository implements GoalRepositoryInterface
{
    public function __construct(Goal $model)
    {
        parent::__construct($model);
    }
}
