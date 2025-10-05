<?php

namespace Modules\Training\Repositories\InternalTrainingManagement;

use Modules\Training\Repositories\InternalTrainingManagement\InternalTrainingManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\InternalTrainingManagement;

class InternalTrainingManagementRepository extends BaseRepository implements InternalTrainingManagementRepositoryInterface
{
    public function __construct(InternalTrainingManagement $model)
    {
        parent::__construct($model);
    }
}
