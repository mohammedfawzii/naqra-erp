<?php

namespace Modules\Performance\Repositories\LearningManagementIntegration;

use Modules\Performance\Repositories\LearningManagementIntegration\LearningManagementIntegrationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\LearningManagementIntegration;

class LearningManagementIntegrationRepository extends BaseRepository implements LearningManagementIntegrationRepositoryInterface
{
    public function __construct(LearningManagementIntegration $model)
    {
        parent::__construct($model);
    }
}
