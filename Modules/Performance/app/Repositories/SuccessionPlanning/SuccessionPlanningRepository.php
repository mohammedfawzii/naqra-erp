<?php

namespace Modules\Performance\Repositories\SuccessionPlanning;

use Modules\Performance\Repositories\SuccessionPlanning\SuccessionPlanningRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\SuccessionPlanning;

class SuccessionPlanningRepository extends BaseRepository implements SuccessionPlanningRepositoryInterface
{
    public function __construct(SuccessionPlanning $model)
    {
        parent::__construct($model);
    }
}
