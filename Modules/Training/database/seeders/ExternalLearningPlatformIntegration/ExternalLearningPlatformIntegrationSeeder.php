<?php

namespace Modules\Training\Database\Seeders\ExternalLearningPlatformIntegration;

use Illuminate\Database\Seeder;
use Modules\Training\Models\ExternalLearningPlatformIntegration;

class ExternalLearningPlatformIntegrationSeeder extends Seeder
{
    public function run(): void
    {
        $external_learning_platform_integrations = [
            [
                'employeeinfo_id' => 2,
                'platform_name' => 'Sample platform_name 1',
                'integration_status' => 'active',
                'last_sync_date' => '2024-11-26 22:30:06',
            ],
            [
                'employeeinfo_id' => 1,
                'platform_name' => 'Sample platform_name 2',
                'integration_status' => 'active',
                'last_sync_date' => '2025-04-03 22:30:06',
            ],
            [
                'employeeinfo_id' => 1,
                'platform_name' => 'Sample platform_name 3',
                'integration_status' => 'active',
                'last_sync_date' => '2024-12-04 22:30:07',
            ],
            [
                'employeeinfo_id' => 1,
                'platform_name' => 'Sample platform_name 4',
                'integration_status' => 'active',
                'last_sync_date' => '2025-06-01 22:30:07',
            ],
            [
                'employeeinfo_id' => 2,
                'platform_name' => 'Sample platform_name 5',
                'integration_status' => 'active',
                'last_sync_date' => '2024-11-20 22:30:07',
            ],
        ];

        foreach ($external_learning_platform_integrations as $data) {
            ExternalLearningPlatformIntegration::firstOrCreate($data);
        }
    }
}
