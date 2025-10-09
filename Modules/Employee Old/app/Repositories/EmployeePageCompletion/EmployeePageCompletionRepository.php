<?php

namespace Modules\Employee\Repositories\EmployeePageCompletion;

 use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeePageCompletion;

class EmployeePageCompletionRepository extends BaseRepository implements EmployeePageCompletionRepositoryInterface
{
    public function __construct(EmployeePageCompletion $model)
    {
        parent::__construct($model);
    }

  public function findByPageEmployee($employeeId, $pageName)
{
    return $this->model
        ->where('employee_id', $employeeId)
        ->where('page_name', $pageName)
        ->latest()
        ->first(); 

}
}
