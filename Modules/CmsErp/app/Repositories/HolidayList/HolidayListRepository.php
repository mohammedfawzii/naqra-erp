<?php

namespace Modules\CmsErp\Repositories\HolidayList;

use Modules\CmsErp\Repositories\HolidayList\HolidayListRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\HolidayList;

class HolidayListRepository extends BaseRepository implements HolidayListRepositoryInterface
{
    public function __construct(HolidayList $model)
    {
        parent::__construct($model);
    }
}
