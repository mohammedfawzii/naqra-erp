<?php

namespace Modules\CmsErp\Repositories\NoticePeriod;

use Modules\CmsErp\Repositories\NoticePeriod\NoticePeriodRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\NoticePeriod;

class NoticePeriodRepository extends BaseRepository implements NoticePeriodRepositoryInterface
{
    public function __construct(NoticePeriod $model)
    {
        parent::__construct($model);
    }
}
