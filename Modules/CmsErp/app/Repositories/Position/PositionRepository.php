<?php

namespace Modules\CmsErp\Repositories\Position;

use Modules\CmsErp\Repositories\Position\PositionRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Position;

class PositionRepository extends BaseRepository implements PositionRepositoryInterface
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }
}
