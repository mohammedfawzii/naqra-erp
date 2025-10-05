<?php

namespace Modules\AttendanceTracking\Repositories\TimeTrackingIntegration;

use Modules\AttendanceTracking\Repositories\TimeTrackingIntegration\TimeTrackingIntegrationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\TimeTrackingIntegration;

class TimeTrackingIntegrationRepository extends BaseRepository implements TimeTrackingIntegrationRepositoryInterface
{
    public function __construct(TimeTrackingIntegration $model)
    {
        parent::__construct($model);
    }
}
