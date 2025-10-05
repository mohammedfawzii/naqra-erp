<?php

namespace Modules\Payroll\Repositories\AttendanceManagement;

use Modules\Payroll\Repositories\AttendanceManagement\AttendanceManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\AttendanceManagement;

class AttendanceManagementRepository extends BaseRepository implements AttendanceManagementRepositoryInterface
{
    public function __construct(AttendanceManagement $model)
    {
        parent::__construct($model);
    }
}
