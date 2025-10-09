<?php

namespace Modules\Employee\Http\Controllers\BaseInformationEmployee;

use Modules\Employee\Repositories\BaseInformationEmployee\BaseInformationEmployeeRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\BaseInformationEmployee\BaseInformationEmployeeStoreRequest;
use Modules\Employee\Http\Requests\BaseInformationEmployee\BaseInformationEmployeeUpdateRequest;
use Modules\Employee\Transformers\BaseInformationEmployee\BaseInformationEmployeeResource;
use Modules\Employee\Transformers\BaseInformationEmployee\BaseInformationEmployeeResourceEnums;

class BaseInformationEmployeeController extends BaseEmployeeController
{
    public function __construct(BaseInformationEmployeeRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/base-information');
        $this->storeRequestClass = BaseInformationEmployeeStoreRequest::class;
        $this->updateRequestClass = BaseInformationEmployeeUpdateRequest::class;
        $this->resourceClass = BaseInformationEmployeeResource::class;
        $this->enumResourceClass = BaseInformationEmployeeResourceEnums::class;

        $this->collectionName = 'BaseInformationEmployee';
    }
}



