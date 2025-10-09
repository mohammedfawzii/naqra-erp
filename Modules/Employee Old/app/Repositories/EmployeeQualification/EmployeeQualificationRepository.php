<?php

namespace Modules\Employee\Repositories\EmployeeQualification;

use Modules\Employee\Repositories\EmployeeQualification\EmployeeQualificationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeQualification;

class EmployeeQualificationRepository extends BaseRepository implements EmployeeQualificationRepositoryInterface
{
    public function __construct(EmployeeQualification $model)
    {
        parent::__construct($model);
    }
}
