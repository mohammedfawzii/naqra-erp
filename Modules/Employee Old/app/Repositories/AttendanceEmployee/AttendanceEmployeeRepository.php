<?php

namespace Modules\Employee\Repositories\AttendanceEmployee;

use Modules\Employee\Repositories\AttendanceEmployee\AttendanceEmployeeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\AttendanceEmployee;

class AttendanceEmployeeRepository extends BaseRepository implements AttendanceEmployeeRepositoryInterface
{
    public function __construct(AttendanceEmployee $model)
    {
        parent::__construct($model);
    }
}
