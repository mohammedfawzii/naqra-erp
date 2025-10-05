<?php

namespace Modules\AttendanceTracking\Database\Seeders\EmployeeLeaveSelfService;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\EmployeeLeaveSelfService;

class EmployeeLeaveSelfServiceSeeder extends Seeder
{
    public function run(): void
    {
        $employee_leave_self_services = [
            [
                'employee_id' => 1,
                'holidays_list_id' => 2,
                'request_status' => 'pending',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'holidays_list_id' => 1,
                'request_status' => 'pending',
                'attendance_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'holidays_list_id' => 2,
                'request_status' => 'pending',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'holidays_list_id' => 1,
                'request_status' => 'pending',
                'attendance_attachments_id' => 3,
            ],
            [
                'employee_id' => 1,
                'holidays_list_id' => 1,
                'request_status' => 'pending',
                'attendance_attachments_id' => 2,
            ],
        ];

        foreach ($employee_leave_self_services as $data) {
            EmployeeLeaveSelfService::firstOrCreate($data);
        }
    }
}
