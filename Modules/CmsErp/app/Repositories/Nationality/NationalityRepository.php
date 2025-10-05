<?php

namespace Modules\CmsErp\Repositories\Nationality;

use Modules\CmsErp\Repositories\Nationality\NationalityRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Nationality;

class NationalityRepository extends BaseRepository implements NationalityRepositoryInterface
{
    public function __construct(Nationality $model)
    {
        parent::__construct($model);
    }
}
