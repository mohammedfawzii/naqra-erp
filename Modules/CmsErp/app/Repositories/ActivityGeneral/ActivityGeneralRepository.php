<?php

namespace Modules\CmsErp\Repositories\ActivityGeneral;

use Modules\CmsErp\Repositories\ActivityGeneral\ActivityGeneralRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\ActivityGeneral;

class ActivityGeneralRepository extends BaseRepository implements ActivityGeneralRepositoryInterface
{
    public function __construct(ActivityGeneral $model)
    {
        parent::__construct($model);
    }
}
