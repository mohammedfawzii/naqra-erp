<?php

namespace Modules\Employee\Repositories\EmployeeFinancialEntitlement;

use Modules\Employee\Repositories\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeFinancialEntitlement;

class EmployeeFinancialEntitlementRepository extends BaseRepository implements EmployeeFinancialEntitlementRepositoryInterface
{
    public function __construct(EmployeeFinancialEntitlement $model)
    {
        parent::__construct($model);
    }
}
