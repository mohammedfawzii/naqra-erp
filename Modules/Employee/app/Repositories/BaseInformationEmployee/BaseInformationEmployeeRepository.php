<?php

namespace Modules\Employee\Repositories\BaseInformationEmployee;

use Modules\Employee\Repositories\BaseInformationEmployee\BaseInformationEmployeeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\BaseInformationEmployee;

class BaseInformationEmployeeRepository extends BaseRepository implements BaseInformationEmployeeRepositoryInterface
{
    public function __construct(BaseInformationEmployee $model)
    {
        parent::__construct($model);
    }
}
