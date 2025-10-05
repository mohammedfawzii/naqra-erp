<?php

namespace Modules\AttendanceTracking\Repositories\AttendanceCompliance;

use Modules\AttendanceTracking\Repositories\AttendanceCompliance\AttendanceComplianceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\AttendanceTracking\Models\AttendanceCompliance;

class AttendanceComplianceRepository extends BaseRepository implements AttendanceComplianceRepositoryInterface
{
    public function __construct(AttendanceCompliance $model)
    {
        parent::__construct($model);
    }
}
