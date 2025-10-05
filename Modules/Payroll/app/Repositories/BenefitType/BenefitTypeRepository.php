<?php

namespace Modules\Payroll\Repositories\BenefitType;

use Modules\Payroll\Repositories\BenefitType\BenefitTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Payroll\Models\BenefitType;

class BenefitTypeRepository extends BaseRepository implements BenefitTypeRepositoryInterface
{
    public function __construct(BenefitType $model)
    {
        parent::__construct($model);
    }
}
