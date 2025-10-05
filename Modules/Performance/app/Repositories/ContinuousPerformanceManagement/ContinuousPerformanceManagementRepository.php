<?php

namespace Modules\Performance\Repositories\ContinuousPerformanceManagement;

use Modules\Performance\Repositories\ContinuousPerformanceManagement\ContinuousPerformanceManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\ContinuousPerformanceManagement;

class ContinuousPerformanceManagementRepository extends BaseRepository implements ContinuousPerformanceManagementRepositoryInterface
{
    public function __construct(ContinuousPerformanceManagement $model)
    {
        parent::__construct($model);
    }
}
