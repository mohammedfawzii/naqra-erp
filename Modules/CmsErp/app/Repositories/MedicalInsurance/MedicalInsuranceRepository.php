<?php

namespace Modules\CmsErp\Repositories\MedicalInsurance;

use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\MedicalInsurance;

class MedicalInsuranceRepository extends BaseRepository implements MedicalInsuranceRepositoryInterface
{
    public function __construct(MedicalInsurance $model)
    {
        parent::__construct($model);
    }
}
