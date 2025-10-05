<?php

namespace Modules\CmsErp\Repositories\EducationalLevel;

use Modules\CmsErp\Repositories\EducationalLevel\EducationalLevelRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\EducationalLevel;

class EducationalLevelRepository extends BaseRepository implements EducationalLevelRepositoryInterface
{
    public function __construct(EducationalLevel $model)
    {
        parent::__construct($model);
    }
}
