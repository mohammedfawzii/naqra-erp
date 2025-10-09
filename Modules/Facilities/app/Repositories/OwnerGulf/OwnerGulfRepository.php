<?php

namespace Modules\Facilities\Repositories\OwnerGulf;

use Modules\Facilities\Repositories\OwnerGulf\OwnerGulfRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerGulf;

class OwnerGulfRepository extends BaseRepository implements OwnerGulfRepositoryInterface
{
    public function __construct(OwnerGulf $model)
    {
        parent::__construct($model);
    }
}
