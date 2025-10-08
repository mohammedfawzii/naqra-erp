<?php

namespace Modules\Employee\Repositories\EmployeeAllowance;

use Modules\Employee\Repositories\EmployeeAllowance\EmployeeAllowanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeAllowance;

class EmployeeAllowanceRepository extends BaseRepository implements EmployeeAllowanceRepositoryInterface
{
    public function __construct(EmployeeAllowance $model)
    {
        parent::__construct($model);
    }
}
