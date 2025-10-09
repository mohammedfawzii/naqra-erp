<?php

namespace Modules\Facilities\Repositories\Branch;

use Modules\Facilities\Repositories\Branch\BranchRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\Branch;

class BranchRepository extends BaseRepository implements BranchRepositoryInterface
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}
