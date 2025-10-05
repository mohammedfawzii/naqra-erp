<?php

namespace Modules\Performance\Repositories\Feedback;

use Modules\Performance\Repositories\Feedback\FeedbackRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\Feedback;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{
    public function __construct(Feedback $model)
    {
        parent::__construct($model);
    }
}
