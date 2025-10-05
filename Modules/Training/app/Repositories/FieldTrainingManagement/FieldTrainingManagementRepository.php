<?php

namespace Modules\Training\Repositories\FieldTrainingManagement;

use Modules\Training\Repositories\FieldTrainingManagement\FieldTrainingManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\FieldTrainingManagement;

class FieldTrainingManagementRepository extends BaseRepository implements FieldTrainingManagementRepositoryInterface
{
    public function __construct(FieldTrainingManagement $model)
    {
        parent::__construct($model);
    }
}
