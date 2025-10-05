<?php

namespace Modules\Auth\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository\BaseRepository;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function verifyAccount($user_id)
    {
        $user = $this->model->find($user_id);
        if ($user) {
            $user->update(['is_fully_verified' => 1]);
        }
        return $user;
    }
    public function getByFiled($field, $value)
    {
        return $this->model->where($field, $value)->first();
    }

    public function getById($id)
    {

        return $this->model->find($id);
    }

    public function firstOrCreate($google_id,$data)
    {
        $user = $this->model->where('google_id', $google_id)->first();

        if ($user) {
            return $user;
        }

        return $this->model->create($data);
    }
}
