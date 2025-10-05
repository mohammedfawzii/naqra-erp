<?php

namespace Modules\Payroll\Repositories\BenefitEmployee;

use Modules\Payroll\Repositories\BenefitEmployee\BenefitEmployeeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\BenefitEmployee;

class BenefitEmployeeRepository extends BaseRepository implements BenefitEmployeeRepositoryInterface
{
    public function __construct(BenefitEmployee $model)
    {
        parent::__construct($model);
    }
}
