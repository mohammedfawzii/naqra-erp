<?php

namespace Modules\Training\Repositories\TrainingNeedsAssessment;

use Modules\Training\Repositories\TrainingNeedsAssessment\TrainingNeedsAssessmentRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\TrainingNeedsAssessment;

class TrainingNeedsAssessmentRepository extends BaseRepository implements TrainingNeedsAssessmentRepositoryInterface
{
    public function __construct(TrainingNeedsAssessment $model)
    {
        parent::__construct($model);
    }
}
