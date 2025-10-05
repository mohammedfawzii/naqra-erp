<?php

namespace Modules\CmsErp\Repositories\Relationship;

use Modules\CmsErp\Repositories\Relationship\RelationshipRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Relationship;

class RelationshipRepository extends BaseRepository implements RelationshipRepositoryInterface
{
    public function __construct(Relationship $model)
    {
        parent::__construct($model);
    }
}
