<?php

namespace Modules\Employee\Repositories\EmployeeAddress;

use Modules\Employee\Repositories\EmployeeAddress\EmployeeAddressRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeAddress;

class EmployeeAddressRepository extends BaseRepository implements EmployeeAddressRepositoryInterface
{
    public function __construct(EmployeeAddress $model)
    {
        parent::__construct($model);
    }
}
