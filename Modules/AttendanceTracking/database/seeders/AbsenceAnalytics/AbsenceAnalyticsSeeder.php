<?php

namespace Modules\AttendanceTracking\Database\Seeders\AbsenceAnalytics;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AbsenceAnalytics;

class AbsenceAnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        $absence_analytics = [
            [
                'time_period' => 'Sample time_period 1',
                'absence_rate' => 28.49,
                'absence_reason' => 'Sample absence_reason 1',
                'attendance_attachments_id' => 1,
            ],
            [
                'time_period' => 'Sample time_period 2',
                'absence_rate' => 40.68,
                'absence_reason' => 'Sample absence_reason 2',
                'attendance_attachments_id' => 1,
            ],
            [
                'time_period' => 'Sample time_period 3',
                'absence_rate' => 38.98,
                'absence_reason' => 'Sample absence_reason 3',
                'attendance_attachments_id' => 1,
            ],
            [
                'time_period' => 'Sample time_period 4',
                'absence_rate' => 76.45,
                'absence_reason' => 'Sample absence_reason 4',
                'attendance_attachments_id' => 2,
            ],
            [
                'time_period' => 'Sample time_period 5',
                'absence_rate' => 98.82,
                'absence_reason' => 'Sample absence_reason 5',
                'attendance_attachments_id' => 2,
            ],
        ];

        foreach ($absence_analytics as $data) {
            AbsenceAnalytics::firstOrCreate($data);
        }
    }
}
