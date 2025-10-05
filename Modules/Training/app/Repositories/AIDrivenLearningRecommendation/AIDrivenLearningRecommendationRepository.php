<?php

namespace Modules\Training\Repositories\AIDrivenLearningRecommendation;

use Modules\Training\Repositories\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Training\Models\AIDrivenLearningRecommendation;

class AIDrivenLearningRecommendationRepository extends BaseRepository implements AIDrivenLearningRecommendationRepositoryInterface
{
    public function __construct(AIDrivenLearningRecommendation $model)
    {
        parent::__construct($model);
    }
}
