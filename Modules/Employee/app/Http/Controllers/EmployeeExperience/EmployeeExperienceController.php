<?php

namespace Modules\Employee\Http\Controllers\EmployeeExperience;

use Modules\Employee\Repositories\EmployeeExperience\EmployeeExperienceRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeExperience\EmployeeExperienceStoreRequest;
use Modules\Employee\Http\Requests\EmployeeExperience\EmployeeExperienceUpdateRequest;
use Modules\Employee\Transformers\EmployeeExperience\EmployeeExperienceResource;
use Modules\Employee\Transformers\EmployeeExperience\EmployeeExperienceResourceEnums;

class EmployeeExperienceController extends BaseEmployeeController
{
    public function __construct(EmployeeExperienceRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeexperience');
        $this->storeRequestClass = EmployeeExperienceStoreRequest::class;
        $this->updateRequestClass = EmployeeExperienceUpdateRequest::class;
        $this->resourceClass = EmployeeExperienceResource::class;
        $this->enumResourceClass = EmployeeExperienceResourceEnums::class;

        $this->collectionName = 'EmployeeExperience';
    }
}
