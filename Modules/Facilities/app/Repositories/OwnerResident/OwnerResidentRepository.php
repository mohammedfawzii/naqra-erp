<?php

namespace Modules\Facilities\Repositories\OwnerResident;

use Modules\Facilities\Repositories\OwnerResident\OwnerResidentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerResident;

class OwnerResidentRepository extends BaseRepository implements OwnerResidentRepositoryInterface
{
    public function __construct(OwnerResident $model)
    {
        parent::__construct($model);
    }
}
