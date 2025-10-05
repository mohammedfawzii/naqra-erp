<?php

namespace Modules\Auth\Repositories\UserTwoFactor;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface UserTwoFactorRepositoryInterface extends BaseRepositoryInterface
{
        public function getForVerification($user_id, $method);
        public function checkAllMethodsVerified($user_id);
            public function getByUserAndMethod($user_id, $method);

}
