<?php

namespace Modules\CmsErp\Repositories\SalaryType;

use Modules\CmsErp\Repositories\SalaryType\SalaryTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\SalaryType;

class SalaryTypeRepository extends BaseRepository implements SalaryTypeRepositoryInterface
{
    public function __construct(SalaryType $model)
    {
        parent::__construct($model);
    }
}
