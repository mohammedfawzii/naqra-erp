<?php

namespace Modules\Payroll\Repositories\EndofServiceCalculationscls;

use Modules\Payroll\Repositories\EndofServiceCalculationscls\EndofServiceCalculationsclsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\EndofServiceCalculationscls;

class EndofServiceCalculationsclsRepository extends BaseRepository implements EndofServiceCalculationsclsRepositoryInterface
{
    public function __construct(EndofServiceCalculationscls $model)
    {
        parent::__construct($model);
    }
}
