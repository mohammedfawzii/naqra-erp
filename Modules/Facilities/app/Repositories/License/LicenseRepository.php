<?php

namespace Modules\Facilities\Repositories\License;

use Modules\Facilities\Repositories\License\LicenseRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\License;

class LicenseRepository extends BaseRepository implements LicenseRepositoryInterface
{
    public function __construct(License $model)
    {
        parent::__construct($model);
    }
}
