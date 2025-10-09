<?php

namespace Modules\Employee\Http\Controllers\EmployeeAccount;

use Modules\Employee\Repositories\EmployeeAccount\EmployeeAccountRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeAccount\EmployeeAccountStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAccount\EmployeeAccountUpdateRequest;
use Modules\Employee\Transformers\EmployeeAccount\EmployeeAccountResource;
use Modules\Employee\Transformers\EmployeeAccount\EmployeeAccountResourceEnums;

class EmployeeAccountController extends BaseEmployeeController
{
    public function __construct(EmployeeAccountRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeaccount');
        $this->storeRequestClass = EmployeeAccountStoreRequest::class;
        $this->updateRequestClass = EmployeeAccountUpdateRequest::class;
        $this->resourceClass = EmployeeAccountResource::class;
        $this->enumResourceClass = EmployeeAccountResourceEnums::class;

        $this->collectionName = 'EmployeeAccount';
    }
}
