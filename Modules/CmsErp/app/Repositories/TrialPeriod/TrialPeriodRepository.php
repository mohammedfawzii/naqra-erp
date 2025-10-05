<?php

namespace Modules\CmsErp\Repositories\TrialPeriod;

use Modules\CmsErp\Repositories\TrialPeriod\TrialPeriodRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\TrialPeriod;

class TrialPeriodRepository extends BaseRepository implements TrialPeriodRepositoryInterface
{
    public function __construct(TrialPeriod $model)
    {
        parent::__construct($model);
    }
}
