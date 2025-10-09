<?php

namespace Modules\Employee\Http\Controllers\EmployeeAddress;

use Modules\Employee\Repositories\EmployeeAddress\EmployeeAddressRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeAddress\EmployeeAddressStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAddress\EmployeeAddressUpdateRequest;
use Modules\Employee\Transformers\EmployeeAddress\EmployeeAddressResource;
use Modules\Employee\Transformers\EmployeeAddress\EmployeeAddressResourceEnums;

class EmployeeAddressController extends BaseEmployeeController
{
    public function __construct(EmployeeAddressRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeaddress');
        $this->storeRequestClass = EmployeeAddressStoreRequest::class;
        $this->updateRequestClass = EmployeeAddressUpdateRequest::class;
        $this->resourceClass = EmployeeAddressResource::class;
        $this->enumResourceClass = EmployeeAddressResourceEnums::class;

        $this->collectionName = 'EmployeeAddress';
    }
}
