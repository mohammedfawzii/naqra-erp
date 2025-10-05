<?php

namespace Modules\AttendanceTracking\Repositories\AbsenceAnalytics;

use Modules\AttendanceTracking\Repositories\AbsenceAnalytics\AbsenceAnalyticsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\AbsenceAnalytics;

class AbsenceAnalyticsRepository extends BaseRepository implements AbsenceAnalyticsRepositoryInterface
{
    public function __construct(AbsenceAnalytics $model)
    {
        parent::__construct($model);
    }
}
