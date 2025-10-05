<?php

namespace Modules\Performance\Repositories\Feedback360;

use Modules\Performance\Repositories\Feedback360\Feedback360RepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\Feedback360;

class Feedback360Repository extends BaseRepository implements Feedback360RepositoryInterface
{
    public function __construct(Feedback360 $model)
    {
        parent::__construct($model);
    }
}
