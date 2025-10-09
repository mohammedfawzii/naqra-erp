<?php

namespace Modules\Employee\Http\Controllers\EmployeeOtherEntitlement;

use Modules\Employee\Repositories\EmployeeOtherEntitlement\EmployeeOtherEntitlementRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeOtherEntitlement\EmployeeOtherEntitlementStoreRequest;
use Modules\Employee\Http\Requests\EmployeeOtherEntitlement\EmployeeOtherEntitlementUpdateRequest;
use Modules\Employee\Transformers\EmployeeOtherEntitlement\EmployeeOtherEntitlementResource;
use Modules\Employee\Transformers\EmployeeOtherEntitlement\EmployeeOtherEntitlementResourceEnums;

class EmployeeOtherEntitlementController extends BaseEmployeeController
{
    public function __construct(EmployeeOtherEntitlementRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeotherentitlement');
        $this->storeRequestClass = EmployeeOtherEntitlementStoreRequest::class;
        $this->updateRequestClass = EmployeeOtherEntitlementUpdateRequest::class;
        $this->resourceClass = EmployeeOtherEntitlementResource::class;
        $this->enumResourceClass = EmployeeOtherEntitlementResourceEnums::class;

        $this->collectionName = 'EmployeeOtherEntitlement';
    }
}
