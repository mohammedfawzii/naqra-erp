<?php

namespace Modules\AttendanceTracking\Database\Seeders\ShiftSchedule;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\ShiftSchedule;

class ShiftScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $shift_schedules = [
            [
                'employee_id' => 1,
                'shift_type' => 'Morning',
                'shift_date' => '2025-09-25',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 2,
                'shift_type' => 'Night',
                'shift_date' => '2025-09-25',
                'start_time' => '16:00:00',
                'end_time' => '00:00:00',
                                'attendance_attachments_id'=>123,

            ],
        ];

        foreach ($shift_schedules as $data) {
            ShiftSchedule::firstOrCreate(
                [
                    'employee_id' => $data['employee_id'],
                    'shift_date'  => $data['shift_date'],
                ],
                $data
            );
        }
    }
}
