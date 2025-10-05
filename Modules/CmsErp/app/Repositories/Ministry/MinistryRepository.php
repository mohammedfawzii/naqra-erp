<?php

namespace Modules\CmsErp\Repositories\Ministry;

use Modules\CmsErp\Repositories\Ministry\MinistryRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Ministry;

class MinistryRepository extends BaseRepository implements MinistryRepositoryInterface
{
    public function __construct(Ministry $model)
    {
        parent::__construct($model);
    }
}
