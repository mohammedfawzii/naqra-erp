<?php

namespace Modules\CmsErp\Repositories\SubscriptionType;

use Modules\CmsErp\Repositories\SubscriptionType\SubscriptionTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\SubscriptionType;

class SubscriptionTypeRepository extends BaseRepository implements SubscriptionTypeRepositoryInterface
{
    public function __construct(SubscriptionType $model)
    {
        parent::__construct($model);
    }
}
