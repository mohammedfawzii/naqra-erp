<?php

namespace Modules\Payroll\Repositories\PayrollManagement;

use Modules\Payroll\Repositories\PayrollManagement\PayrollManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PayrollManagement;

class PayrollManagementRepository extends BaseRepository implements PayrollManagementRepositoryInterface
{
    public function __construct(PayrollManagement $model)
    {
        parent::__construct($model);
    }
}
