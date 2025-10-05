<?php

namespace Modules\AttendanceTracking\Repositories\ShiftSchedule;

use Modules\AttendanceTracking\Repositories\ShiftSchedule\ShiftScheduleRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\ShiftSchedule;

class ShiftScheduleRepository extends BaseRepository implements ShiftScheduleRepositoryInterface
{
    public function __construct(ShiftSchedule $model)
    {
        parent::__construct($model);
    }
}
