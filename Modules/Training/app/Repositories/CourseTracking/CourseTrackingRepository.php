<?php

namespace Modules\Training\Repositories\CourseTracking;

use Modules\Training\Repositories\CourseTracking\CourseTrackingRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\CourseTracking;

class CourseTrackingRepository extends BaseRepository implements CourseTrackingRepositoryInterface
{
    public function __construct(CourseTracking $model)
    {
        parent::__construct($model);
    }
}
