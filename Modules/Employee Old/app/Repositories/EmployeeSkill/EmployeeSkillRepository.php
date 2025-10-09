<?php

namespace Modules\Employee\Repositories\EmployeeSkill;

use Modules\Employee\Repositories\EmployeeSkill\EmployeeSkillRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeSkill;

class EmployeeSkillRepository extends BaseRepository implements EmployeeSkillRepositoryInterface
{
    public function __construct(EmployeeSkill $model)
    {
        parent::__construct($model);
    }
}
