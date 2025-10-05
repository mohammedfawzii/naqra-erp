<?php

namespace Modules\AttendanceTracking\Repositories\LeaveRequest;

use Modules\AttendanceTracking\Repositories\LeaveRequest\LeaveRequestRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\LeaveRequest;

class LeaveRequestRepository extends BaseRepository implements LeaveRequestRepositoryInterface
{
    public function __construct(LeaveRequest $model)
    {
        parent::__construct($model);
    }
}
