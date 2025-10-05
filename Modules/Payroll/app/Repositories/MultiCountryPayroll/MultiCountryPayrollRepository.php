<?php

namespace Modules\Payroll\Repositories\MultiCountryPayroll;

use Modules\Payroll\Repositories\MultiCountryPayroll\MultiCountryPayrollRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\MultiCountryPayroll;

class MultiCountryPayrollRepository extends BaseRepository implements MultiCountryPayrollRepositoryInterface
{
    public function __construct(MultiCountryPayroll $model)
    {
        parent::__construct($model);
    }
}
