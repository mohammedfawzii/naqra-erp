<?php

namespace Modules\Payroll\Repositories\EndofServiceCalculations;

use Modules\Payroll\Repositories\EndofServiceCalculations\EndofServiceCalculationsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\EndofServiceCalculations;

class EndofServiceCalculationsRepository extends BaseRepository implements EndofServiceCalculationsRepositoryInterface
{
    public function __construct(EndofServiceCalculations $model)
    {
        parent::__construct($model);
    }
}
