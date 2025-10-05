<?php

namespace Modules\AttendanceTracking\Repositories\BiometricIntegration;

use Modules\AttendanceTracking\Repositories\BiometricIntegration\BiometricIntegrationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\BiometricIntegration;

class BiometricIntegrationRepository extends BaseRepository implements BiometricIntegrationRepositoryInterface
{
    public function __construct(BiometricIntegration $model)
    {
        parent::__construct($model);
    }
}
