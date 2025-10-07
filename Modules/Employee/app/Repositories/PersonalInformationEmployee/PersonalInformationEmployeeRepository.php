<?php

namespace Modules\Employee\Repositories\PersonalInformationEmployee;

use Modules\Employee\Repositories\PersonalInformationEmployee\PersonalInformationEmployeeRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\PersonalInformationEmployee;

class PersonalInformationEmployeeRepository extends BaseRepository implements PersonalInformationEmployeeRepositoryInterface
{
    public function __construct(PersonalInformationEmployee $model)
    {
        parent::__construct($model);
    }
}
