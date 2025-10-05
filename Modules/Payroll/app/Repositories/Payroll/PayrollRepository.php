<?php

namespace Modules\Payroll\Repositories\Payroll;

use Modules\Payroll\Repositories\Payroll\PayrollRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\Payroll;

class PayrollRepository extends BaseRepository implements PayrollRepositoryInterface
{
    public function __construct(Payroll $model)
    {
        parent::__construct($model);
    }
}
