<?php

namespace Modules\AttendanceTracking\Repositories\EmployeeLeaveSelfService;

use Modules\AttendanceTracking\Repositories\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\EmployeeLeaveSelfService;

class EmployeeLeaveSelfServiceRepository extends BaseRepository implements EmployeeLeaveSelfServiceRepositoryInterface
{
    public function __construct(EmployeeLeaveSelfService $model)
    {
        parent::__construct($model);
    }
}
