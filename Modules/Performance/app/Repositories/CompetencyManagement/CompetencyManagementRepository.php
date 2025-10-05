<?php

namespace Modules\Performance\Repositories\CompetencyManagement;

use Modules\Performance\Repositories\CompetencyManagement\CompetencyManagementRepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\Performance\Models\CompetencyManagement;

class CompetencyManagementRepository extends BaseRepository implements CompetencyManagementRepositoryInterface
{
    public function __construct(CompetencyManagement $model)
    {
        parent::__construct($model);
    }
}
