<?php

namespace Modules\Performance\Repositories\Evaluation;

use Modules\Performance\Repositories\Evaluation\EvaluationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\Evaluation;

class EvaluationRepository extends BaseRepository implements EvaluationRepositoryInterface
{
    public function __construct(Evaluation $model)
    {
        parent::__construct($model);
    }
}
