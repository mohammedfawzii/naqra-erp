<?php

namespace Modules\Employee\Repositories\EmployeeCourse;

use Modules\Employee\Repositories\EmployeeCourse\EmployeeCourseRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeCourse;

class EmployeeCourseRepository extends BaseRepository implements EmployeeCourseRepositoryInterface
{
    public function __construct(EmployeeCourse $model)
    {
        parent::__construct($model);
    }
}
