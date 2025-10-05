<?php

namespace Modules\Payroll\Repositories\PayrollAnalytics;

use Modules\Payroll\Repositories\PayrollAnalytics\PayrollAnalyticsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PayrollAnalytics;

class PayrollAnalyticsRepository extends BaseRepository implements PayrollAnalyticsRepositoryInterface
{
    public function __construct(PayrollAnalytics $model)
    {
        parent::__construct($model);
    }
}
