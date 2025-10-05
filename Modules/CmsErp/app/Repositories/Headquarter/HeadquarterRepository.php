<?php

namespace Modules\CmsErp\Repositories\Headquarter;

use Modules\CmsErp\Repositories\Headquarter\HeadquarterRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Headquarter;

class HeadquarterRepository extends BaseRepository implements HeadquarterRepositoryInterface
{
    public function __construct(Headquarter $model)
    {
        parent::__construct($model);
    }
}
