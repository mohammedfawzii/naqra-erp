<?php

namespace Modules\Employee\Repositories\EmployeeLanguage;

use Modules\Employee\Repositories\EmployeeLanguage\EmployeeLanguageRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Employee\Models\EmployeeLanguage;

class EmployeeLanguageRepository extends BaseRepository implements EmployeeLanguageRepositoryInterface
{
    public function __construct(EmployeeLanguage $model)
    {
        parent::__construct($model);
    }
}
