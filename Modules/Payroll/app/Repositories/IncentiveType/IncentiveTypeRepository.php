<?php

namespace Modules\Payroll\Repositories\IncentiveType;

use Modules\Payroll\Repositories\IncentiveType\IncentiveTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\IncentiveType;

class IncentiveTypeRepository extends BaseRepository implements IncentiveTypeRepositoryInterface
{
    public function __construct(IncentiveType $model)
    {
        parent::__construct($model);
    }
}
