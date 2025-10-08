<?php

namespace Modules\Employee\Repositories\EmployeeHoliday;

use Modules\Employee\Repositories\EmployeeHoliday\EmployeeHolidayRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeHoliday;

class EmployeeHolidayRepository extends BaseRepository implements EmployeeHolidayRepositoryInterface
{
    public function __construct(EmployeeHoliday $model)
    {
        parent::__construct($model);
    }
}
