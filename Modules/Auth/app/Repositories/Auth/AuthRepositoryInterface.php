<?php

namespace Modules\Auth\Repositories\Auth;

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface AuthRepositoryInterface extends BaseRepositoryInterface
{
    public function verifyAccount($user_id);
    public function getByFiled($field, $value);
    public function getById($id);
    public function firstOrCreate(string $google_id,array $data);
}
