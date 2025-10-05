<?php

namespace Modules\AttendanceTracking\Repositories\LeavePolicy;

use Modules\AttendanceTracking\Repositories\LeavePolicy\LeavePolicyRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\LeavePolicy;

class LeavePolicyRepository extends BaseRepository implements LeavePolicyRepositoryInterface
{
    public function __construct(LeavePolicy $model)
    {
        parent::__construct($model);
    }
}
