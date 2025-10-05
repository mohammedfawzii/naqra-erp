<?php

namespace Modules\CmsErp\Repositories\Department;

use Modules\CmsErp\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Department;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }
}
