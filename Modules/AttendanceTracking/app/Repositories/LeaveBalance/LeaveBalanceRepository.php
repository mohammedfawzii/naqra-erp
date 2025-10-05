<?php

namespace Modules\AttendanceTracking\Repositories\LeaveBalance;

use Modules\AttendanceTracking\Repositories\LeaveBalance\LeaveBalanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\LeaveBalance;

class LeaveBalanceRepository extends BaseRepository implements LeaveBalanceRepositoryInterface
{
    public function __construct(LeaveBalance $model)
    {
        parent::__construct($model);
    }
}
