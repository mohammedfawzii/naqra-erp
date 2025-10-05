<?php

namespace Modules\AttendanceTracking\Repositories\AttendanceLeaveAnalytics;

use Modules\AttendanceTracking\Repositories\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\AttendanceLeaveAnalytics;

class AttendanceLeaveAnalyticsRepository extends BaseRepository implements AttendanceLeaveAnalyticsRepositoryInterface
{
    public function __construct(AttendanceLeaveAnalytics $model)
    {
        parent::__construct($model);
    }
}
