<?php

namespace Modules\CmsErp\Repositories\Bank;

use Modules\CmsErp\Repositories\Bank\BankRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\CmsErp\Models\Bank;

class BankRepository extends BaseRepository implements BankRepositoryInterface
{
    public function __construct(Bank $model)
    {
        parent::__construct($model);
    }
}
