<?php

namespace Modules\Employee\Http\Controllers\EmployeeAllowance;

use Modules\Employee\Repositories\EmployeeAllowance\EmployeeAllowanceRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeAllowance\EmployeeAllowanceStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAllowance\EmployeeAllowanceUpdateRequest;
use Modules\Employee\Transformers\EmployeeAllowance\EmployeeAllowanceResource;
use Modules\Employee\Transformers\EmployeeAllowance\EmployeeAllowanceResourceEnums;

class EmployeeAllowanceController extends BaseEmployeeController
{
    public function __construct(EmployeeAllowanceRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeallowance');
        $this->storeRequestClass = EmployeeAllowanceStoreRequest::class;
        $this->updateRequestClass = EmployeeAllowanceUpdateRequest::class;
        $this->resourceClass = EmployeeAllowanceResource::class;
        $this->enumResourceClass = EmployeeAllowanceResourceEnums::class;

        $this->collectionName = 'EmployeeAllowance';
    }
}
