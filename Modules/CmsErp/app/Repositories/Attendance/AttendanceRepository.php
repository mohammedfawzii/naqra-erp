<?php

namespace Modules\CmsErp\Repositories\Attendance;

use Modules\CmsErp\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Attendance;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }
}
