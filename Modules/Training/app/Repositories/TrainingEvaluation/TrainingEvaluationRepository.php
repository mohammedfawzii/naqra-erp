<?php

namespace Modules\Training\Repositories\TrainingEvaluation;

use Modules\Training\Repositories\TrainingEvaluation\TrainingEvaluationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\TrainingEvaluation;

class TrainingEvaluationRepository extends BaseRepository implements TrainingEvaluationRepositoryInterface
{
    public function __construct(TrainingEvaluation $model)
    {
        parent::__construct($model);
    }
}
