<?php

namespace Modules\Performance\Database\Seeders\DevelopmentPlan;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\DevelopmentPlan;

class DevelopmentPlanSeeder extends Seeder
{
    public function run(): void
    {
        $development_plans = [
            [
                'employeeinfo_id' => 2,
                'description' => 'Sample description 1',
                'targeted_skills' => 'Sample targeted_skills 1',
                'start_date' => '2005-09-28',
                'end_date' => '2024-09-28',
                'status' => 'Sample status 1',
            ],
            [
                'employeeinfo_id' => 1,
                'description' => 'Sample description 2',
                'targeted_skills' => 'Sample targeted_skills 2',
                'start_date' => '2006-09-28',
                'end_date' => '2021-09-28',
                'status' => 'Sample status 2',
            ],
            [
                'employeeinfo_id' => 2,
                'description' => 'Sample description 3',
                'targeted_skills' => 'Sample targeted_skills 3',
                'start_date' => '2009-09-28',
                'end_date' => '2012-09-28',
                'status' => 'Sample status 3',
            ],
            [
                'employeeinfo_id' => 2,
                'description' => 'Sample description 4',
                'targeted_skills' => 'Sample targeted_skills 4',
                'start_date' => '2018-09-28',
                'end_date' => '2019-09-28',
                'status' => 'Sample status 4',
            ],
            [
                'employeeinfo_id' => 1,
                'description' => 'Sample description 5',
                'targeted_skills' => 'Sample targeted_skills 5',
                'start_date' => '2005-09-28',
                'end_date' => '2008-09-28',
                'status' => 'Sample status 5',
            ],
        ];

        foreach ($development_plans as $data) {
            DevelopmentPlan::firstOrCreate($data);
        }
    }
}
