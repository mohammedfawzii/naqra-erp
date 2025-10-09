<?php

namespace Modules\Employee\Http\Controllers\EmployeeQualification;

use Modules\Employee\Repositories\EmployeeQualification\EmployeeQualificationRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeQualification\EmployeeQualificationStoreRequest;
use Modules\Employee\Http\Requests\EmployeeQualification\EmployeeQualificationUpdateRequest;
use Modules\Employee\Transformers\EmployeeQualification\EmployeeQualificationResource;
use Modules\Employee\Transformers\EmployeeQualification\EmployeeQualificationResourceEnums;

class EmployeeQualificationController extends BaseEmployeeController
{
    public function __construct(EmployeeQualificationRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeequalification');
        $this->storeRequestClass = EmployeeQualificationStoreRequest::class;
        $this->updateRequestClass = EmployeeQualificationUpdateRequest::class;
        $this->resourceClass = EmployeeQualificationResource::class;
        $this->enumResourceClass = EmployeeQualificationResourceEnums::class;

        $this->collectionName = 'EmployeeQualification';
    }
}
