<?php

namespace Modules\CmsErp\Repositories\Allowance;

use Modules\CmsErp\Repositories\Allowance\AllowanceRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Allowance;

class AllowanceRepository extends BaseRepository implements AllowanceRepositoryInterface
{
    public function __construct(Allowance $model)
    {
        parent::__construct($model);
    }
}
