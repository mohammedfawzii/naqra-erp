<?php

namespace Modules\Training\Repositories\LicensingAndCertificationManagement;

use Modules\Training\Repositories\LicensingAndCertificationManagement\LicensingAndCertificationManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\LicensingAndCertificationManagement;

class LicensingAndCertificationManagementRepository extends BaseRepository implements LicensingAndCertificationManagementRepositoryInterface
{
    public function __construct(LicensingAndCertificationManagement $model)
    {
        parent::__construct($model);
    }
}
