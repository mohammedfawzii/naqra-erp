<?php

namespace Modules\Payroll\Repositories\Incentive;

use Modules\Payroll\Repositories\Incentive\IncentiveRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\Incentive;

class IncentiveRepository extends BaseRepository implements IncentiveRepositoryInterface
{
    public function __construct(Incentive $model)
    {
        parent::__construct($model);
    }
}
