<?php

namespace Modules\Payroll\Repositories\LoanType;

use Modules\Payroll\Repositories\LoanType\LoanTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\LoanType;

class LoanTypeRepository extends BaseRepository implements LoanTypeRepositoryInterface
{
    public function __construct(LoanType $model)
    {
        parent::__construct($model);
    }
}
