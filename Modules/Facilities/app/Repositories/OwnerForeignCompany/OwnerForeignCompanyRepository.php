<?php

namespace Modules\Facilities\Repositories\OwnerForeignCompany;

use Modules\Facilities\Repositories\OwnerForeignCompany\OwnerForeignCompanyRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Models\OwnerForeignCompany;

class OwnerForeignCompanyRepository extends BaseRepository implements OwnerForeignCompanyRepositoryInterface
{
    public function __construct(OwnerForeignCompany $model)
    {
        parent::__construct($model);
    }
}
