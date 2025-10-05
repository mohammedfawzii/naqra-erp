<?php

namespace Modules\CmsErp\Repositories\CompanyType;

use Modules\CmsErp\Repositories\CompanyType\CompanyTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\CompanyType;

class CompanyTypeRepository extends BaseRepository implements CompanyTypeRepositoryInterface
{
    public function __construct(CompanyType $model)
    {
        parent::__construct($model);
    }
}
