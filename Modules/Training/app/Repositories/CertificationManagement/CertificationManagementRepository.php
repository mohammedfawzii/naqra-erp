<?php

namespace Modules\Training\Repositories\CertificationManagement;

use Modules\Training\Repositories\CertificationManagement\CertificationManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\CertificationManagement;

class CertificationManagementRepository extends BaseRepository implements CertificationManagementRepositoryInterface
{
    public function __construct(CertificationManagement $model)
    {
        parent::__construct($model);
    }
}
