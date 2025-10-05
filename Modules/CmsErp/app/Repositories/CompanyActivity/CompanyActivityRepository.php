<?php

namespace Modules\CmsErp\Repositories\CompanyActivity;

use Modules\CmsErp\Repositories\CompanyActivity\CompanyActivityRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\CompanyActivity;

class CompanyActivityRepository extends BaseRepository implements CompanyActivityRepositoryInterface
{
    public function __construct(CompanyActivity $model)
    {
        parent::__construct($model);
    }
}
