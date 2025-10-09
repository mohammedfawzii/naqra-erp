<?php

namespace Modules\Facilities\Repositories\PeriodicObligations;

use Modules\Facilities\Repositories\PeriodicObligations\PeriodicObligationsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\PeriodicObligations;

class PeriodicObligationsRepository extends BaseRepository implements PeriodicObligationsRepositoryInterface
{
    public function __construct(PeriodicObligations $model)
    {
        parent::__construct($model);
    }
}
