<?php

namespace Modules\Auth\Repositories\UserTwoFactor;

 use App\Models\UserTwoFactor;
use App\Repositories\BaseRepository\BaseRepository;

class UserTwoFactorRepository extends BaseRepository implements UserTwoFactorRepositoryInterface
{
    public function __construct(UserTwoFactor $model)
    {
        parent::__construct($model);
    }
    public function getForVerification($user_id, $method)
    {
      return  $this->model->where([
            'user_id' => $user_id,
            'method'  => $method,
            'is_verified' => false,
         ])->first();
        
        
    }

    public function checkAllMethodsVerified($user_id)
    {
        return $this->model->where('user_id', $user_id)
            ->where('is_verified', false)
            ->count() === 0;
    }

    public function getByUserAndMethod($user_id, $method)
    {
        return $this->model->where('user_id', $user_id)
            ->where('method', $method)
            ->first();
    }
    
}
