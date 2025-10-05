<?php

namespace Modules\Payroll\Repositories\TaxDeductionType;

use Modules\Payroll\Repositories\TaxDeductionType\TaxDeductionTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\TaxDeductionType;

class TaxDeductionTypeRepository extends BaseRepository implements TaxDeductionTypeRepositoryInterface
{
    public function __construct(TaxDeductionType $model)
    {
        parent::__construct($model);
    }
}
