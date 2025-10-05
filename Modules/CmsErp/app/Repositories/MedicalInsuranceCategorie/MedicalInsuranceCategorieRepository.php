<?php

namespace Modules\CmsErp\Repositories\MedicalInsuranceCategorie;

use Modules\CmsErp\Repositories\MedicalInsuranceCategorie\MedicalInsuranceCategorieRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\MedicalInsuranceCategorie;

class MedicalInsuranceCategorieRepository extends BaseRepository implements MedicalInsuranceCategorieRepositoryInterface
{
    public function __construct(MedicalInsuranceCategorie $model)
    {
        parent::__construct($model);
    }
}
