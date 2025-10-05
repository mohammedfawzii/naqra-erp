<?php

namespace Modules\AttendanceTracking\Repositories\RemoteAttendance;

use Modules\AttendanceTracking\Repositories\RemoteAttendance\RemoteAttendanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\RemoteAttendance;

class RemoteAttendanceRepository extends BaseRepository implements RemoteAttendanceRepositoryInterface
{
    public function __construct(RemoteAttendance $model)
    {
        parent::__construct($model);
    }
}
