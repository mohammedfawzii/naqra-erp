<?php

namespace Modules\AttendanceTracking\Database\Seeders\RemoteAttendance;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\RemoteAttendance;

class RemoteAttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $remote_attendances = [
            [
                'employee_id' => 2,
                'attendance_location' => 'Sample attendance_location 1',
                'remote_check_in_time' => '2024-10-09 14:42:28',
                'remote_check_out_time' => '2025-02-25 14:42:28',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'attendance_location' => 'Sample attendance_location 2',
                'remote_check_in_time' => '2025-09-21 14:42:28',
                'remote_check_out_time' => '2024-10-10 14:42:28',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'attendance_location' => 'Sample attendance_location 3',
                'remote_check_in_time' => '2025-06-22 14:42:28',
                'remote_check_out_time' => '2024-06-05 14:42:28',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 1,
                'attendance_location' => 'Sample attendance_location 4',
                'remote_check_in_time' => '2025-02-25 14:42:28',
                'remote_check_out_time' => '2025-01-16 14:42:28',
                'attendance_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'attendance_location' => 'Sample attendance_location 5',
                'remote_check_in_time' => '2025-01-19 14:42:28',
                'remote_check_out_time' => '2024-09-10 14:42:28',
                'attendance_attachments_id' => 3,
            ],
        ];

        foreach ($remote_attendances as $data) {
            RemoteAttendance::firstOrCreate($data);
        }
    }
}
