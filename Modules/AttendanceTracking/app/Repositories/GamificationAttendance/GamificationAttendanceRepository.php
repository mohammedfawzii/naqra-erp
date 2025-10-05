<?php

namespace Modules\AttendanceTracking\Repositories\GamificationAttendance;

use Modules\AttendanceTracking\Repositories\GamificationAttendance\GamificationAttendanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\GamificationAttendance;

class GamificationAttendanceRepository extends BaseRepository implements GamificationAttendanceRepositoryInterface
{
    public function __construct(GamificationAttendance $model)
    {
        parent::__construct($model);
    }
}
