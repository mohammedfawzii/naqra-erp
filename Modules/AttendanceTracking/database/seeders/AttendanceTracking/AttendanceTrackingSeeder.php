<?php

namespace Modules\AttendanceTracking\Database\Seeders\AttendanceTracking;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\AttendanceTracking;

class AttendanceTrackingSeeder extends Seeder
{
    public function run(): void
    {
        $attendance_trackings = [
            [
                'employee_id' => 1,
                'attendance_date' => '2025-09-20',
                'attendance_type' => 'present',
                'check_in_time' => '09:05:00',
                'check_out_time' => '17:15:00',
                'overtime_hours' => 1.25,
                'working_hours' => 8.00,
                'attendance_attachments_id'=>123,
            ],
            [
                'employee_id' => 2,
                'attendance_date' => '2025-09-20',
                'attendance_type' => 'late',
                'check_in_time' => '09:45:00',
                'check_out_time' => '17:00:00',
                'overtime_hours' => 0.00,
                'working_hours' => 7.25,
                                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 3,
                'attendance_date' => '2025-09-20',
                'attendance_type' => 'absent',
                'check_in_time' => null,
                'check_out_time' => null,
                'overtime_hours' => 0.00,
                'working_hours' => 0.00,
                                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 4,
                'attendance_date' => '2025-09-20',
                'attendance_type' => 'leave',
                'check_in_time' => null,
                'check_out_time' => null,
                'overtime_hours' => 0.00,
                'working_hours' => 0.00,
                                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 1,
                'attendance_date' => '2025-09-21',
                'attendance_type' => 'present',
                'check_in_time' => '08:55:00',
                'check_out_time' => '17:30:00',
                'overtime_hours' => 1.50,
                'working_hours' => 8.50,
                                'attendance_attachments_id'=>123,

            ],
        ];

        foreach ($attendance_trackings as $data) {
            AttendanceTracking::firstOrCreate(
                [
                    'employee_id' => $data['employee_id'],
                    'attendance_date' => $data['attendance_date'],
                ],
                $data
            );
        }
    }
}
