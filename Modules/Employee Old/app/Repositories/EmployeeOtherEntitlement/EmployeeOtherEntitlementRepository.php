<?php

namespace Modules\Employee\Repositories\EmployeeOtherEntitlement;

use Modules\Employee\Repositories\EmployeeOtherEntitlement\EmployeeOtherEntitlementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeOtherEntitlement;

class EmployeeOtherEntitlementRepository extends BaseRepository implements EmployeeOtherEntitlementRepositoryInterface
{
    public function __construct(EmployeeOtherEntitlement $model)
    {
        parent::__construct($model);
    }
}
