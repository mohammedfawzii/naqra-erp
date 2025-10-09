<?php

namespace Modules\Employee\Http\Controllers\EmployeeLanguage;

use Modules\Employee\Repositories\EmployeeLanguage\EmployeeLanguageRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeLanguage\EmployeeLanguageStoreRequest;
use Modules\Employee\Http\Requests\EmployeeLanguage\EmployeeLanguageUpdateRequest;
use Modules\Employee\Transformers\EmployeeLanguage\EmployeeLanguageResource;
use Modules\Employee\Transformers\EmployeeLanguage\EmployeeLanguageResourceEnums;

class EmployeeLanguageController extends BaseEmployeeController
{
    public function __construct(EmployeeLanguageRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeelanguage');
        $this->storeRequestClass = EmployeeLanguageStoreRequest::class;
        $this->updateRequestClass = EmployeeLanguageUpdateRequest::class;
        $this->resourceClass = EmployeeLanguageResource::class;
        $this->enumResourceClass = EmployeeLanguageResourceEnums::class;

        $this->collectionName = 'EmployeeLanguage';
    }
}
