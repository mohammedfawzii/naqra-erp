<?php

namespace Modules\Employee\Http\Controllers\EmployeeFinancialEntitlement;

use Modules\Employee\Repositories\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementStoreRequest;
use Modules\Employee\Http\Requests\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementUpdateRequest;
use Modules\Employee\Transformers\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementResource;
use Modules\Employee\Transformers\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementResourceEnums;

class EmployeeFinancialEntitlementController extends BaseEmployeeController
{
    public function __construct(EmployeeFinancialEntitlementRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeefinancialentitlement');
        $this->storeRequestClass = EmployeeFinancialEntitlementStoreRequest::class;
        $this->updateRequestClass = EmployeeFinancialEntitlementUpdateRequest::class;
        $this->resourceClass = EmployeeFinancialEntitlementResource::class;
        $this->enumResourceClass = EmployeeFinancialEntitlementResourceEnums::class;

        $this->collectionName = 'EmployeeFinancialEntitlement';
    }
}
