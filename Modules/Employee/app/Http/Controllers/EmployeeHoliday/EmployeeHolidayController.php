<?php

namespace Modules\Employee\Http\Controllers\EmployeeHoliday;

use Modules\Employee\Repositories\EmployeeHoliday\EmployeeHolidayRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\EmployeeHoliday\EmployeeHolidayStoreRequest;
use Modules\Employee\Http\Requests\EmployeeHoliday\EmployeeHolidayUpdateRequest;
use Modules\Employee\Transformers\EmployeeHoliday\EmployeeHolidayResource;
use Modules\Employee\Transformers\EmployeeHoliday\EmployeeHolidayResourceEnums;

class EmployeeHolidayController extends BaseEmployeeController
{
    public function __construct(EmployeeHolidayRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/employeeholiday');
        $this->storeRequestClass = EmployeeHolidayStoreRequest::class;
        $this->updateRequestClass = EmployeeHolidayUpdateRequest::class;
        $this->resourceClass = EmployeeHolidayResource::class;
        $this->enumResourceClass = EmployeeHolidayResourceEnums::class;

        $this->collectionName = 'EmployeeHoliday';
    }
}
