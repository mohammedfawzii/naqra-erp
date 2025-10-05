<?php

namespace Modules\Performance\Repositories\PromotionReward;

use Modules\Performance\Repositories\PromotionReward\PromotionRewardRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\PromotionReward;

class PromotionRewardRepository extends BaseRepository implements PromotionRewardRepositoryInterface
{
    public function __construct(PromotionReward $model)
    {
        parent::__construct($model);
    }
}
