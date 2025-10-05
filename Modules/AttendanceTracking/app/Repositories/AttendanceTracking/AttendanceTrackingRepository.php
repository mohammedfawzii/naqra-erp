<?php

namespace Modules\AttendanceTracking\Repositories\AttendanceTracking;

use Modules\AttendanceTracking\Repositories\AttendanceTracking\AttendanceTrackingRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\AttendanceTracking;

class AttendanceTrackingRepository extends BaseRepository implements AttendanceTrackingRepositoryInterface
{
    public function __construct(AttendanceTracking $model)
    {
        parent::__construct($model);
    }
}
