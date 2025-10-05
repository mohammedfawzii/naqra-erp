<?php

namespace Modules\CmsErp\Repositories\Country;

use Modules\CmsErp\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Country;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
