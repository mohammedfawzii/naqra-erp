<?php

namespace Modules\Training\Repositories\ExternalLearningPlatformIntegration;

use Modules\Training\Repositories\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\ExternalLearningPlatformIntegration;

class ExternalLearningPlatformIntegrationRepository extends BaseRepository implements ExternalLearningPlatformIntegrationRepositoryInterface
{
    public function __construct(ExternalLearningPlatformIntegration $model)
    {
        parent::__construct($model);
    }
}
