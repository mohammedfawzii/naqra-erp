<?php

namespace Modules\Employee\Http\Controllers\AttendanceEmployee;

use Modules\Employee\Repositories\AttendanceEmployee\AttendanceEmployeeRepositoryInterface;
use Modules\Employee\Http\Controllers\BaseEmployeeController\BaseEmployeeController;
use Modules\Employee\Http\Requests\AttendanceEmployee\AttendanceEmployeeStoreRequest;
use Modules\Employee\Http\Requests\AttendanceEmployee\AttendanceEmployeeUpdateRequest;
use Modules\Employee\Transformers\AttendanceEmployee\AttendanceEmployeeResource;
use Modules\Employee\Transformers\AttendanceEmployee\AttendanceEmployeeResourceEnums;

class AttendanceEmployeeController extends BaseEmployeeController
{
    public function __construct(AttendanceEmployeeRepositoryInterface $repository)
    {
        parent::__construct();

        $this->initService($repository, 'employee/attendanceemployee');
        $this->storeRequestClass = AttendanceEmployeeStoreRequest::class;
        $this->updateRequestClass = AttendanceEmployeeUpdateRequest::class;
        $this->resourceClass = AttendanceEmployeeResource::class;
        $this->enumResourceClass = AttendanceEmployeeResourceEnums::class;

        $this->collectionName = 'AttendanceEmployee';
    }
}
