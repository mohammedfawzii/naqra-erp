<?php

namespace Modules\AttendanceTracking\Repositories\FlexibleLeaveManagement;

use Modules\AttendanceTracking\Repositories\FlexibleLeaveManagement\FlexibleLeaveManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\FlexibleLeaveManagement;

class FlexibleLeaveManagementRepository extends BaseRepository implements FlexibleLeaveManagementRepositoryInterface
{
    public function __construct(FlexibleLeaveManagement $model)
    {
        parent::__construct($model);
    }
}
