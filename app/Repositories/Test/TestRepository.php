<?php

namespace App\Repositories\Test;

use App\Repositories\Test\TestRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use App\Models\Test;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{
    public function __construct(Test $model)
    {
        parent::__construct($model);
    }
}
