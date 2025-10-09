<?php

namespace Modules\Employee\Http\Controllers\EmployeeMedicalRecord;

use Modules\Employee\Repositories\EmployeeMedicalRecord\EmployeeMedicalRecordRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeMedicalRecord\EmployeeMedicalRecordStoreRequest;
use Modules\Employee\Http\Requests\EmployeeMedicalRecord\EmployeeMedicalRecordUpdateRequest;
use Modules\Employee\Transformers\EmployeeMedicalRecord\EmployeeMedicalRecordResource;
use Modules\Employee\Transformers\EmployeeMedicalRecord\EmployeeMedicalRecordResourceEnums;

class EmployeeMedicalRecordController extends BaseEmployeeController
{
    public function __construct(EmployeeMedicalRecordRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeemedicalrecord');
        $this->storeRequestClass = EmployeeMedicalRecordStoreRequest::class;
        $this->updateRequestClass = EmployeeMedicalRecordUpdateRequest::class;
        $this->resourceClass = EmployeeMedicalRecordResource::class;
        $this->enumResourceClass = EmployeeMedicalRecordResourceEnums::class;

        $this->collectionName = 'EmployeeMedicalRecord';
    }
}
