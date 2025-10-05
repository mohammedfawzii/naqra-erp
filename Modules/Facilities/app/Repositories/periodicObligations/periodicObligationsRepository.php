<?php

namespace Modules\Facilities\Repositories\periodicObligations;

use Modules\Facilities\Repositories\periodicObligations\periodicObligationsRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\periodicObligations;

class periodicObligationsRepository extends BaseRepository implements periodicObligationsRepositoryInterface
{
    public function __construct(periodicObligations $model)
    {
        parent::__construct($model);
    }
}
