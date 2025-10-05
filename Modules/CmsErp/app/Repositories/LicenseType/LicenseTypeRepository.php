<?php

namespace Modules\CmsErp\Repositories\LicenseType;

use Modules\CmsErp\Repositories\LicenseType\LicenseTypeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\LicenseType;

class LicenseTypeRepository extends BaseRepository implements LicenseTypeRepositoryInterface
{
    public function __construct(LicenseType $model)
    {
        parent::__construct($model);
    }
}
