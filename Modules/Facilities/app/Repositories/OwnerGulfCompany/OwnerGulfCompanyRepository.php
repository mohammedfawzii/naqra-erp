<?php

namespace Modules\Facilities\Repositories\OwnerGulfCompany;

use Modules\Facilities\Repositories\OwnerGulfCompany\OwnerGulfCompanyRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerGulfCompany;

class OwnerGulfCompanyRepository extends BaseRepository implements OwnerGulfCompanyRepositoryInterface
{
    public function __construct(OwnerGulfCompany $model)
    {
        parent::__construct($model);
    }
}
