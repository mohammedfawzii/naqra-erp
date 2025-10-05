<?php

namespace Modules\CmsErp\Repositories\Subscription;

use Modules\CmsErp\Repositories\Subscription\SubscriptionRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Subscription;

class SubscriptionRepository extends BaseRepository implements SubscriptionRepositoryInterface
{
    public function __construct(Subscription $model)
    {
        parent::__construct($model);
    }
}
