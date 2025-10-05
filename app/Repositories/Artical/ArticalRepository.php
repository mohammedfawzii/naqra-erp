<?php

namespace App\Repositories\Artical;

use App\Repositories\Artical\ArticalRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Artical;

class ArticalRepository extends BaseRepository implements ArticalRepositoryInterface
{
    public function __construct(Artical $model)
    {
        parent::__construct($model);
    }
}
