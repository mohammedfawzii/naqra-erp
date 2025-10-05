<?php

namespace Modules\Payroll\Database\Seeders\AttendanceManagement;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\AttendanceManagement;

class AttendanceManagementSeeder extends Seeder
{
    public function run(): void
    {
        $attendance_management = [
            [
                'employee_id' => 2,
                'attendance_date' => '2016-09-22',
                'time_in' => 139,
                'time_out' => 208,
                'work_hours' => 493,
                'overtime_hours' => 712,
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'attendance_date' => '2007-09-22',
                'time_in' => 947,
                'time_out' => 239,
                'work_hours' => 856,
                'overtime_hours' => 845,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'attendance_date' => '2016-09-22',
                'time_in' => 290,
                'time_out' => 848,
                'work_hours' => 458,
                'overtime_hours' => 642,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'attendance_date' => '2023-09-22',
                'time_in' => 918,
                'time_out' => 407,
                'work_hours' => 852,
                'overtime_hours' => 705,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'attendance_date' => '2017-09-22',
                'time_in' => 820,
                'time_out' => 885,
                'work_hours' => 337,
                'overtime_hours' => 934,
                'payroll_attachments_id' => 1,
            ],
        ];

        foreach ($attendance_management as $data) {
            AttendanceManagement::firstOrCreate($data);
        }
    }
}
