<?php

namespace Modules\CmsErp\Repositories\OwnershipType;

use Modules\CmsErp\Repositories\OwnershipType\OwnershipTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\OwnershipType;

class OwnershipTypeRepository extends BaseRepository implements OwnershipTypeRepositoryInterface
{
    public function __construct(OwnershipType $model)
    {
        parent::__construct($model);
    }
}
