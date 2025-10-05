<?php

namespace Modules\CmsErp\Repositories\Religion;

use Modules\CmsErp\Repositories\Religion\ReligionRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Religion;

class ReligionRepository extends BaseRepository implements ReligionRepositoryInterface
{
    public function __construct(Religion $model)
    {
        parent::__construct($model);
    }
}
