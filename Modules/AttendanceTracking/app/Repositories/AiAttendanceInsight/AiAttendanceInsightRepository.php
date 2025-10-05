<?php

namespace Modules\AttendanceTracking\Repositories\AiAttendanceInsight;

use Modules\AttendanceTracking\Repositories\AiAttendanceInsight\AiAttendanceInsightRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\AiAttendanceInsight;

class AiAttendanceInsightRepository extends BaseRepository implements AiAttendanceInsightRepositoryInterface
{
    public function __construct(AiAttendanceInsight $model)
    {
        parent::__construct($model);
    }
}
