<?php

namespace Modules\Employee\Repositories\EmployeePageCompletion;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface EmployeePageCompletionRepositoryInterface extends BaseRepositoryInterface
{
    public function findByPageEmployee($employeeId,$pageName);
}
