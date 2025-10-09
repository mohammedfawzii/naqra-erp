<?php

namespace Modules\Employee\Http\Controllers\PersonalInformationEmployee;

use Modules\Employee\Repositories\PersonalInformationEmployee\PersonalInformationEmployeeRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\PersonalInformationEmployee\PersonalInformationEmployeeStoreRequest;
use Modules\Employee\Http\Requests\PersonalInformationEmployee\PersonalInformationEmployeeUpdateRequest;
use Modules\Employee\Transformers\PersonalInformationEmployee\PersonalInformationEmployeeResource;
use Modules\Employee\Transformers\PersonalInformationEmployee\PersonalInformationEmployeeResourceEnums;

class PersonalInformationEmployeeController extends BaseEmployeeController
{
    public function __construct(PersonalInformationEmployeeRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/personalinformationemployee');
        $this->storeRequestClass = PersonalInformationEmployeeStoreRequest::class;
        $this->updateRequestClass = PersonalInformationEmployeeUpdateRequest::class;
        $this->resourceClass = PersonalInformationEmployeeResource::class;
        $this->enumResourceClass = PersonalInformationEmployeeResourceEnums::class;

        $this->collectionName = 'PersonalInformationEmployee';
    }
}
