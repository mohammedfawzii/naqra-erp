<?php

namespace Modules\Payroll\Repositories\TaxDeduction;

use Modules\Payroll\Repositories\TaxDeduction\TaxDeductionRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\TaxDeduction;

class TaxDeductionRepository extends BaseRepository implements TaxDeductionRepositoryInterface
{
    public function __construct(TaxDeduction $model)
    {
        parent::__construct($model);
    }
}
