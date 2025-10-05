<?php

namespace Modules\Facilities\Repositories\Owner;

use Modules\Facilities\Repositories\Owner\OwnerRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\Owner;

class OwnerRepository extends BaseRepository implements OwnerRepositoryInterface
{
    public function __construct(Owner $model)
    {
        parent::__construct($model);
    }
}
