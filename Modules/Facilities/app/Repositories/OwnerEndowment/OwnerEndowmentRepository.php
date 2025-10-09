<?php

namespace Modules\Facilities\Repositories\OwnerEndowment;

use Modules\Facilities\Repositories\OwnerEndowment\OwnerEndowmentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerEndowment;

class OwnerEndowmentRepository extends BaseRepository implements OwnerEndowmentRepositoryInterface
{
    public function __construct(OwnerEndowment $model)
    {
        parent::__construct($model);
    }
}
