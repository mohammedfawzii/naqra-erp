<?php

namespace Modules\CmsErp\Repositories\ActivityPrivate;

use Modules\CmsErp\Repositories\ActivityPrivate\ActivityPrivateRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\ActivityPrivate;

class ActivityPrivateRepository extends BaseRepository implements ActivityPrivateRepositoryInterface
{
    public function __construct(ActivityPrivate $model)
    {
        parent::__construct($model);
    }
}
