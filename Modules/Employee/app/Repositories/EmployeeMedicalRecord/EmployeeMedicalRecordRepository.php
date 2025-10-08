<?php

namespace Modules\Employee\Repositories\EmployeeMedicalRecord;

use Modules\Employee\Repositories\EmployeeMedicalRecord\EmployeeMedicalRecordRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeMedicalRecord;

class EmployeeMedicalRecordRepository extends BaseRepository implements EmployeeMedicalRecordRepositoryInterface
{
    public function __construct(EmployeeMedicalRecord $model)
    {
        parent::__construct($model);
    }
}
