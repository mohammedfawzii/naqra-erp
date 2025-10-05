<?php

namespace Modules\AttendanceTracking\Database\Seeders\TimeTrackingIntegration;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\TimeTrackingIntegration;

class TimeTrackingIntegrationSeeder extends Seeder
{
    public function run(): void
    {
        $time_tracking_integrations = [
             [
                'system_name' => 'Jira',
                'integration_type' => 'api',
                'integration_status' => 'active',
                                'attendance_attachments_id' => 123,

            ],
            [
                'system_name' => 'SAP SuccessFactors',
                'integration_type' => 'api',
                'integration_status' => 'active',
                'attendance_attachments_id' => 123,

            ],
        ];

        foreach ($time_tracking_integrations as $data) {
            TimeTrackingIntegration::firstOrCreate($data);
        }
    }
}
