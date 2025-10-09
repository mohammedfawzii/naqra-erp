<?php

namespace Modules\Employee\Repositories\EmployeeAccount;

use Modules\Employee\Repositories\EmployeeAccount\EmployeeAccountRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeAccount;

class EmployeeAccountRepository extends BaseRepository implements EmployeeAccountRepositoryInterface
{
    public function __construct(EmployeeAccount $model)
    {
        parent::__construct($model);
    }
}
