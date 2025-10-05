<?php

namespace Modules\Performance\Database\Seeders\ContinuousPerformanceManagement;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\ContinuousPerformanceManagement;

class ContinuousPerformanceManagementSeeder extends Seeder
{
    public function run(): void
    {
        $continuous_performance_management = [
            [
                'employeeinfo_id' => 1,
                'activity_id' => 1,
                'activity_date' => '2023-09-28',
                'ongoing_rating' => 'Sample ongoing_rating 1',
                'description' => 'Sample description 1',
            ],
            [
                'employeeinfo_id' => 1,
                'activity_id' => 2,
                'activity_date' => '2018-09-28',
                'ongoing_rating' => 'Sample ongoing_rating 2',
                'description' => 'Sample description 2',
            ],
            [
                'employeeinfo_id' => 3,
                'activity_id' => 2,
                'activity_date' => '2024-09-28',
                'ongoing_rating' => 'Sample ongoing_rating 3',
                'description' => 'Sample description 3',
            ],
            [
                'employeeinfo_id' => 3,
                'activity_id' => 2,
                'activity_date' => '2008-09-28',
                'ongoing_rating' => 'Sample ongoing_rating 4',
                'description' => 'Sample description 4',
            ],
            [
                'employeeinfo_id' => 3,
                'activity_id' => 3,
                'activity_date' => '2007-09-28',
                'ongoing_rating' => 'Sample ongoing_rating 5',
                'description' => 'Sample description 5',
            ],
        ];

        foreach ($continuous_performance_management as $data) {
            ContinuousPerformanceManagement::firstOrCreate($data);
        }
    }
}
