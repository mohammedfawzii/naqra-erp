<?php

namespace Modules\Employee\Repositories\EmployeeExperience;

use Modules\Employee\Repositories\EmployeeExperience\EmployeeExperienceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeExperience;

class EmployeeExperienceRepository extends BaseRepository implements EmployeeExperienceRepositoryInterface
{
    public function __construct(EmployeeExperience $model)
    {
        parent::__construct($model);
    }
}
