<?php

namespace Modules\Facilities\Repositories\DigitalFacility;

use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\DigitalFacility;

class DigitalFacilityRepository extends BaseRepository implements DigitalFacilityRepositoryInterface
{
    public function __construct(DigitalFacility $model)
    {
        parent::__construct($model);
    }
}
