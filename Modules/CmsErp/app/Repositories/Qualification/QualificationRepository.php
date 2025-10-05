<?php

namespace Modules\CmsErp\Repositories\Qualification;

use Modules\CmsErp\Repositories\Qualification\QualificationRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Qualification;

class QualificationRepository extends BaseRepository implements QualificationRepositoryInterface
{
    public function __construct(Qualification $model)
    {
        parent::__construct($model);
    }
}
