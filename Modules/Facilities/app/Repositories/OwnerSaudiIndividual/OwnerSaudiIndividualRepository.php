<?php

namespace Modules\Facilities\Repositories\OwnerSaudiIndividual;

use Modules\Facilities\Repositories\OwnerSaudiIndividual\OwnerSaudiIndividualRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerSaudiIndividual;

class OwnerSaudiIndividualRepository extends BaseRepository implements OwnerSaudiIndividualRepositoryInterface
{
    public function __construct(OwnerSaudiIndividual $model)
    {
        parent::__construct($model);
    }
}
