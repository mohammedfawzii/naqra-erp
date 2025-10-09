<?php

namespace Modules\Employee\Http\Controllers\EmployeeSkill;

use Modules\Employee\Repositories\EmployeeSkill\EmployeeSkillRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeSkill\EmployeeSkillStoreRequest;
use Modules\Employee\Http\Requests\EmployeeSkill\EmployeeSkillUpdateRequest;
use Modules\Employee\Transformers\EmployeeSkill\EmployeeSkillResource;
use Modules\Employee\Transformers\EmployeeSkill\EmployeeSkillResourceEnums;

class EmployeeSkillController extends BaseEmployeeController
{
    public function __construct(EmployeeSkillRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeskill');
        $this->storeRequestClass = EmployeeSkillStoreRequest::class;
        $this->updateRequestClass = EmployeeSkillUpdateRequest::class;
        $this->resourceClass = EmployeeSkillResource::class;
        $this->enumResourceClass = EmployeeSkillResourceEnums::class;

        $this->collectionName = 'EmployeeSkill';
    }
}
