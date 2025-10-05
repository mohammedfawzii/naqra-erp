<?php

namespace Modules\Performance\Database\Seeders\CompetencyManagement;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\CompetencyManagement;

class CompetencyManagementSeeder extends Seeder
{
    public function run(): void
    {
        $competency_management = [
            [
                'employeeinfo_id' => 1,
                'competency' => 'Sample competency 1',
                'competency_rating' => 'Sample competency_rating 1',
                'target_competency' => 'Sample target_competency 1',
            ],
            [
                'employeeinfo_id' => 2,
                'competency' => 'Sample competency 2',
                'competency_rating' => 'Sample competency_rating 2',
                'target_competency' => 'Sample target_competency 2',
            ],
            [
                'employeeinfo_id' => 3,
                'competency' => 'Sample competency 3',
                'competency_rating' => 'Sample competency_rating 3',
                'target_competency' => 'Sample target_competency 3',
            ],
            [
                'employeeinfo_id' => 1,
                'competency' => 'Sample competency 4',
                'competency_rating' => 'Sample competency_rating 4',
                'target_competency' => 'Sample target_competency 4',
            ],
            [
                'employeeinfo_id' => 3,
                'competency' => 'Sample competency 5',
                'competency_rating' => 'Sample competency_rating 5',
                'target_competency' => 'Sample target_competency 5',
            ],
        ];

        foreach ($competency_management as $data) {
            CompetencyManagement::firstOrCreate($data);
        }
    }
}
