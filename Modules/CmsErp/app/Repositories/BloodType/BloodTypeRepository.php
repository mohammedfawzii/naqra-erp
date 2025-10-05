<?php

namespace Modules\CmsErp\Repositories\BloodType;

use Modules\CmsErp\Repositories\BloodType\BloodTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\BloodType;

class BloodTypeRepository extends BaseRepository implements BloodTypeRepositoryInterface
{
    public function __construct(BloodType $model)
    {
        parent::__construct($model);
    }
}
