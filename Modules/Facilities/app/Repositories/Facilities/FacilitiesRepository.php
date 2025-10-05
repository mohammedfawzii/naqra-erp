<?php

namespace Modules\Facilities\Repositories\Facilities;

use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\Facilities;

class FacilitiesRepository extends BaseRepository implements FacilitiesRepositoryInterface
{
    public function __construct(Facilities $model)
    {
        parent::__construct($model);
    }
}
