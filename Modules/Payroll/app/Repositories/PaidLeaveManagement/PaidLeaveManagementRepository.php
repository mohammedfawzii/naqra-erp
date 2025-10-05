<?php

namespace Modules\Payroll\Repositories\PaidLeaveManagement;

use Modules\Payroll\Repositories\PaidLeaveManagement\PaidLeaveManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PaidLeaveManagement;

class PaidLeaveManagementRepository extends BaseRepository implements PaidLeaveManagementRepositoryInterface
{
    public function __construct(PaidLeaveManagement $model)
    {
        parent::__construct($model);
    }
}
