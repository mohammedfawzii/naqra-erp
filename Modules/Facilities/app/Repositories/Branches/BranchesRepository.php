<?php

namespace Modules\Facilities\Repositories\Branches;

use Modules\Facilities\Repositories\Branches\BranchesRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\Branches;

class BranchesRepository extends BaseRepository implements BranchesRepositoryInterface
{
    public function __construct(Branches $model)
    {
        parent::__construct($model);
    }
}
