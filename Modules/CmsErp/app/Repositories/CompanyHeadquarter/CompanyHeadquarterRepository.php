<?php

namespace Modules\CmsErp\Repositories\CompanyHeadquarter;

use Modules\CmsErp\Repositories\CompanyHeadquarter\CompanyHeadquarterRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\CompanyHeadquarter;

class CompanyHeadquarterRepository extends BaseRepository implements CompanyHeadquarterRepositoryInterface
{
    public function __construct(CompanyHeadquarter $model)
    {
        parent::__construct($model);
    }
}
