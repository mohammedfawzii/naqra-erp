<?php

namespace Modules\Payroll\Repositories\IncentiveStatus;

use Modules\Payroll\Repositories\IncentiveStatus\IncentiveStatusRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\IncentiveStatus;

class IncentiveStatusRepository extends BaseRepository implements IncentiveStatusRepositoryInterface
{
    public function __construct(IncentiveStatus $model)
    {
        parent::__construct($model);
    }
}
