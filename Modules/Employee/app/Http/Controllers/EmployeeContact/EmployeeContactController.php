<?php

namespace Modules\Employee\Http\Controllers\EmployeeContact;

use Modules\Employee\Repositories\EmployeeContact\EmployeeContactRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeContact\EmployeeContactStoreRequest;
use Modules\Employee\Http\Requests\EmployeeContact\EmployeeContactUpdateRequest;
use Modules\Employee\Transformers\EmployeeContact\EmployeeContactResource;
use Modules\Employee\Transformers\EmployeeContact\EmployeeContactResourceEnums;

class EmployeeContactController extends BaseEmployeeController
{
    public function __construct(EmployeeContactRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeecontact');
        $this->storeRequestClass = EmployeeContactStoreRequest::class;
        $this->updateRequestClass = EmployeeContactUpdateRequest::class;
        $this->resourceClass = EmployeeContactResource::class;
        $this->enumResourceClass = EmployeeContactResourceEnums::class;

        $this->collectionName = 'EmployeeContact';
    }
}
