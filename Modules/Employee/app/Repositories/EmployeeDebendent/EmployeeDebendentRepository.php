<?php

namespace Modules\Employee\Repositories\EmployeeDebendent;

use Modules\Employee\Repositories\EmployeeDebendent\EmployeeDebendentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeDebendent;

class EmployeeDebendentRepository extends BaseRepository implements EmployeeDebendentRepositoryInterface
{
    public function __construct(EmployeeDebendent $model)
    {
        parent::__construct($model);
    }
}
