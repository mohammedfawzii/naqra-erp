<?php

namespace Modules\Performance\Repositories\EmployeeRecognitionManagement;

use Modules\Performance\Repositories\EmployeeRecognitionManagement\EmployeeRecognitionManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\EmployeeRecognitionManagement;

class EmployeeRecognitionManagementRepository extends BaseRepository implements EmployeeRecognitionManagementRepositoryInterface
{
    public function __construct(EmployeeRecognitionManagement $model)
    {
        parent::__construct($model);
    }
}
