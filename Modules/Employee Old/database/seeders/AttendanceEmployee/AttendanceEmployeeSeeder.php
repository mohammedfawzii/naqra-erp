<?php

namespace Modules\Employee\Database\Seeders\AttendanceEmployee;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\AttendanceEmployee;

class AttendanceEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $attendance_employees = [
            [
                'basic_hours' => 523,
                'attendance_device_id' => 1,
                'shift_change' => 'Sample shift_change 1',
            ],
            [
                'basic_hours' => 441,
                'attendance_device_id' => 3,
                'shift_change' => 'Sample shift_change 2',
            ],
            [
                'basic_hours' => 6,
                'attendance_device_id' => 3,
                'shift_change' => 'Sample shift_change 3',
            ],
            [
                'basic_hours' => 723,
                'attendance_device_id' => 3,
                'shift_change' => 'Sample shift_change 4',
            ],
            [
                'basic_hours' => 40,
                'attendance_device_id' => 3,
                'shift_change' => 'Sample shift_change 5',
            ],
        ];

        foreach ($attendance_employees as $data) {
            AttendanceEmployee::firstOrCreate($data);
        }
    }
}
