<?php

namespace Modules\Facilities\Repositories\MedicalInsurancesFacilities;

use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\MedicalInsurancesFacilities;

class MedicalInsurancesFacilitiesRepository extends BaseRepository implements MedicalInsurancesFacilitiesRepositoryInterface
{
    public function __construct(MedicalInsurancesFacilities $model)
    {
        parent::__construct($model);
    }
}
