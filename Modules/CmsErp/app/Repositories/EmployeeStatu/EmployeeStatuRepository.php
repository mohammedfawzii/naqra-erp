<?php

namespace Modules\CmsErp\Repositories\EmployeeStatu;

use Modules\CmsErp\Repositories\EmployeeStatu\EmployeeStatuRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\EmployeeStatu;

class EmployeeStatuRepository extends BaseRepository implements EmployeeStatuRepositoryInterface
{
    public function __construct(EmployeeStatu $model)
    {
        parent::__construct($model);
    }
}
