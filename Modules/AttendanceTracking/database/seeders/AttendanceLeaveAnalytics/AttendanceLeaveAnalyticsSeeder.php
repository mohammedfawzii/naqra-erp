<?php

namespace Modules\AttendanceTracking\Database\Seeders\AttendanceLeaveAnalytics;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AttendanceLeaveAnalytics;

class AttendanceLeaveAnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        $attendance_leave_analytics = [
            [
                'time_period' => 'Sample time_period 1',
                'attendance_rate' => 44.94,
                'absence_rate' => 28.92,
                'leave_taken_report' => 77.74,
                'attendance_attachments_id' => 123,
            ],
            [
                'time_period' => 'Sample time_period 2',
                'attendance_rate' => 36.22,
                'absence_rate' => 59.07,
                'leave_taken_report' => 98.71,
                'attendance_attachments_id' => 3,
            ],
            [
                'time_period' => 'Sample time_period 3',
                'attendance_rate' => 31.51,
                'absence_rate' => 57.55,
                'leave_taken_report' => 85.91,
                'attendance_attachments_id' => 2,
            ],
            [
                'time_period' => 'Sample time_period 4',
                'attendance_rate' => 17.01,
                'absence_rate' => 24.45,
                'leave_taken_report' => 65.55,
                'attendance_attachments_id' => 2,
            ],
            [
                'time_period' => 'Sample time_period 5',
                'attendance_rate' => 15.64,
                'absence_rate' => 1.94,
                'leave_taken_report' => 47.30,
                'attendance_attachments_id' => 2,
            ],
        ];

        foreach ($attendance_leave_analytics as $data) {
            AttendanceLeaveAnalytics::firstOrCreate($data);
        }
    }
}
