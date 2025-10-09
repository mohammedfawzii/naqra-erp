<?php

namespace Modules\Employee\Http\Controllers\EmployeeCourse;

use Modules\Employee\Repositories\EmployeeCourse\EmployeeCourseRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeCourse\EmployeeCourseStoreRequest;
use Modules\Employee\Http\Requests\EmployeeCourse\EmployeeCourseUpdateRequest;
use Modules\Employee\Transformers\EmployeeCourse\EmployeeCourseResource;
use Modules\Employee\Transformers\EmployeeCourse\EmployeeCourseResourceEnums;

class EmployeeCourseController extends BaseEmployeeController
{
    public function __construct(EmployeeCourseRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeecourse');
        $this->storeRequestClass = EmployeeCourseStoreRequest::class;
        $this->updateRequestClass = EmployeeCourseUpdateRequest::class;
        $this->resourceClass = EmployeeCourseResource::class;
        $this->enumResourceClass = EmployeeCourseResourceEnums::class;

        $this->collectionName = 'EmployeeCourse';
    }
}
