<?php

namespace Modules\Payroll\Repositories\LoanDeductions;

use Modules\Payroll\Repositories\LoanDeductions\LoanDeductionsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\LoanDeductions;

class LoanDeductionsRepository extends BaseRepository implements LoanDeductionsRepositoryInterface
{
    public function __construct(LoanDeductions $model)
    {
        parent::__construct($model);
    }
}
