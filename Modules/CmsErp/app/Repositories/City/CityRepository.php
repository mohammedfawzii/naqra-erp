<?php

namespace Modules\CmsErp\Repositories\City;

use Modules\CmsErp\Repositories\City\CityRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\City;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
}
