<?php

namespace Modules\Employee\Http\Controllers\EmployeeDebendent;

use Modules\Employee\Repositories\EmployeeDebendent\EmployeeDebendentRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeDebendent\EmployeeDebendentStoreRequest;
use Modules\Employee\Http\Requests\EmployeeDebendent\EmployeeDebendentUpdateRequest;
use Modules\Employee\Transformers\EmployeeDebendent\EmployeeDebendentResource;
use Modules\Employee\Transformers\EmployeeDebendent\EmployeeDebendentResourceEnums;

class EmployeeDebendentController extends BaseEmployeeController
{
    public function __construct(EmployeeDebendentRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeedebendent');
        $this->storeRequestClass = EmployeeDebendentStoreRequest::class;
        $this->updateRequestClass = EmployeeDebendentUpdateRequest::class;
        $this->resourceClass = EmployeeDebendentResource::class;
        $this->enumResourceClass = EmployeeDebendentResourceEnums::class;

        $this->collectionName = 'EmployeeDebendent';
    }
}
