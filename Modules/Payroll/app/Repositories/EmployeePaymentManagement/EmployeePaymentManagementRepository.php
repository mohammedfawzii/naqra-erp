<?php

namespace Modules\Payroll\Repositories\EmployeePaymentManagement;

use Modules\Payroll\Repositories\EmployeePaymentManagement\EmployeePaymentManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\EmployeePaymentManagement;

class EmployeePaymentManagementRepository extends BaseRepository implements EmployeePaymentManagementRepositoryInterface
{
    public function __construct(EmployeePaymentManagement $model)
    {
        parent::__construct($model);
    }
}
