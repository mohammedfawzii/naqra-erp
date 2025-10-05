<?php

namespace Modules\Facilities\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Facilities\Repositories\User\UserRepositoryInterface;
 
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
