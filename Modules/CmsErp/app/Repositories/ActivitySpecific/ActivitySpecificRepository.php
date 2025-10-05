<?php

namespace Modules\CmsErp\Repositories\ActivitySpecific;

use Modules\CmsErp\Repositories\ActivitySpecific\ActivitySpecificRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\ActivitySpecific;

class ActivitySpecificRepository extends BaseRepository implements ActivitySpecificRepositoryInterface
{
    public function __construct(ActivitySpecific $model)
    {
        parent::__construct($model);
    }
}
