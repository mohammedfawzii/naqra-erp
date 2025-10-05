<?php

namespace Modules\Performance\Repositories\AiDrivenPerformanceInsight;

use Modules\Performance\Repositories\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\AiDrivenPerformanceInsight;

class AiDrivenPerformanceInsightRepository extends BaseRepository implements AiDrivenPerformanceInsightRepositoryInterface
{
    public function __construct(AiDrivenPerformanceInsight $model)
    {
        parent::__construct($model);
    }
}
