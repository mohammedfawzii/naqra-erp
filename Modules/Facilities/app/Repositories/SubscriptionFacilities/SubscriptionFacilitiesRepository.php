<?php

namespace Modules\Facilities\Repositories\SubscriptionFacilities;

use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\SubscriptionFacilities;

class SubscriptionFacilitiesRepository extends BaseRepository implements SubscriptionFacilitiesRepositoryInterface
{
    public function __construct(SubscriptionFacilities $model)
    {
        parent::__construct($model);
    }
}
