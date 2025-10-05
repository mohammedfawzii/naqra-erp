<?php

namespace Modules\Training\Repositories\ELearningManagement;

use Modules\Training\Repositories\ELearningManagement\ELearningManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\ELearningManagement;

class ELearningManagementRepository extends BaseRepository implements ELearningManagementRepositoryInterface
{
    public function __construct(ELearningManagement $model)
    {
        parent::__construct($model);
    }
}
