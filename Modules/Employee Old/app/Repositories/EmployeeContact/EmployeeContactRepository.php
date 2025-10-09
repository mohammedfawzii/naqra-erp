<?php

namespace Modules\Employee\Repositories\EmployeeContact;

use Modules\Employee\Repositories\EmployeeContact\EmployeeContactRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeContact;

class EmployeeContactRepository extends BaseRepository implements EmployeeContactRepositoryInterface
{
    public function __construct(EmployeeContact $model)
    {
        parent::__construct($model);
    }
}
