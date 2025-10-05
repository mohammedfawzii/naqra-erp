<?php

namespace Modules\Performance\Database\Seeders\LearningManagementIntegration;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\LearningManagementIntegration;

class LearningManagementIntegrationSeeder extends Seeder
{
    public function run(): void
    {
        $learning_management_integrations = [
            [
                'employeeinfo_id' => 1,
                'learning_platform' => 'Sample learning_platform 1',
                'integration_status' => 'Sample integration_status 1',
                'suggested_course' => 'Sample suggested_course 1',
            ],
            [
                'employeeinfo_id' => 3,
                'learning_platform' => 'Sample learning_platform 2',
                'integration_status' => 'Sample integration_status 2',
                'suggested_course' => 'Sample suggested_course 2',
            ],
            [
                'employeeinfo_id' => 2,
                'learning_platform' => 'Sample learning_platform 3',
                'integration_status' => 'Sample integration_status 3',
                'suggested_course' => 'Sample suggested_course 3',
            ],
            [
                'employeeinfo_id' => 1,
                'learning_platform' => 'Sample learning_platform 4',
                'integration_status' => 'Sample integration_status 4',
                'suggested_course' => 'Sample suggested_course 4',
            ],
            [
                'employeeinfo_id' => 1,
                'learning_platform' => 'Sample learning_platform 5',
                'integration_status' => 'Sample integration_status 5',
                'suggested_course' => 'Sample suggested_course 5',
            ],
        ];

        foreach ($learning_management_integrations as $data) {
            LearningManagementIntegration::firstOrCreate($data);
        }
    }
}
