<?php

namespace Modules\CmsErp\Repositories\Currency;

use Modules\CmsErp\Repositories\Currency\CurrencyRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Currency;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }
}
