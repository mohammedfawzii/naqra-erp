<?php

namespace Modules\Payroll\Repositories\TaxDeductionStatus;

use Modules\Payroll\Repositories\TaxDeductionStatus\TaxDeductionStatusRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\TaxDeductionStatus;

class TaxDeductionStatusRepository extends BaseRepository implements TaxDeductionStatusRepositoryInterface
{
    public function __construct(TaxDeductionStatus $model)
    {
        parent::__construct($model);
    }
}
