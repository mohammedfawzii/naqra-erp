<?php

namespace Modules\Payroll\Repositories\PayrollProfile;

use Modules\Payroll\Repositories\PayrollProfile\PayrollProfileRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\PayrollProfile;

class PayrollProfileRepository extends BaseRepository implements PayrollProfileRepositoryInterface
{
    public function __construct(PayrollProfile $model)
    {
        parent::__construct($model);
    }
}
