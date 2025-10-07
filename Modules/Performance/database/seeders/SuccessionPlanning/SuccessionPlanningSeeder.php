<?php

namespace Modules\Performance\Database\Seeders\SuccessionPlanning;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\SuccessionPlanning;

class SuccessionPlanningSeeder extends Seeder
{
    public function run(): void
    {
        $succession_plannings = [
            [
                'employee_id' => 2,
                'position_id' => 1,
                'readiness_rating' => 'Sample readiness_rating 1',
                'development_plan' => 'Sample development_plan 1',
            ],
            [
                'employee_id' => 3,
                'position_id' => 1,
                'readiness_rating' => 'Sample readiness_rating 2',
                'development_plan' => 'Sample development_plan 2',
            ],
            [
                'employee_id' => 3,
                'position_id' => 3,
                'readiness_rating' => 'Sample readiness_rating 3',
                'development_plan' => 'Sample development_plan 3',
            ],
            [
                'employee_id' => 2,
                'position_id' => 2,
                'readiness_rating' => 'Sample readiness_rating 4',
                'development_plan' => 'Sample development_plan 4',
            ],
            [
                'employee_id' => 3,
                'position_id' => 1,
                'readiness_rating' => 'Sample readiness_rating 5',
                'development_plan' => 'Sample development_plan 5',
            ],
        ];

        foreach ($succession_plannings as $data) {
            SuccessionPlanning::firstOrCreate($data);
        }
    }
}
