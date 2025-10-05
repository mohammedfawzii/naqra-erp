<?php

namespace Modules\CmsErp\Repositories\HolidaysList;

use Modules\CmsErp\Repositories\HolidaysList\HolidaysListRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\HolidaysList;

class HolidaysListRepository extends BaseRepository implements HolidaysListRepositoryInterface
{
    public function __construct(HolidaysList $model)
    {
        parent::__construct($model);
    }
}
