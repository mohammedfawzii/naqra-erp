<?php

namespace Modules\Payroll\Repositories\PayrollReport;

use Modules\Payroll\Repositories\PayrollReport\PayrollReportRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PayrollReport;

class PayrollReportRepository extends BaseRepository implements PayrollReportRepositoryInterface
{
    public function __construct(PayrollReport $model)
    {
        parent::__construct($model);
    }
}
