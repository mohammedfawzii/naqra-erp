<?php

namespace Modules\Facilities\Repositories\OwnerAssociation;

use Modules\Facilities\Repositories\OwnerAssociation\OwnerAssociationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerAssociation;

class OwnerAssociationRepository extends BaseRepository implements OwnerAssociationRepositoryInterface
{
    public function __construct(OwnerAssociation $model)
    {
        parent::__construct($model);
    }
}
