<?php

namespace Modules\CmsErp\Repositories\MaritalStatus;

use Modules\CmsErp\Repositories\MaritalStatus\MaritalStatusRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\MaritalStatus;

class MaritalStatusRepository extends BaseRepository implements MaritalStatusRepositoryInterface
{
    public function __construct(MaritalStatus $model)
    {
        parent::__construct($model);
    }
}
