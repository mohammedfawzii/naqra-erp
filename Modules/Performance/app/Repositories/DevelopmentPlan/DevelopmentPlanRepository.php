<?php

namespace Modules\Performance\Repositories\DevelopmentPlan;

use Modules\Performance\Repositories\DevelopmentPlan\DevelopmentPlanRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\DevelopmentPlan;

class DevelopmentPlanRepository extends BaseRepository implements DevelopmentPlanRepositoryInterface
{
    public function __construct(DevelopmentPlan $model)
    {
        parent::__construct($model);
    }
}
