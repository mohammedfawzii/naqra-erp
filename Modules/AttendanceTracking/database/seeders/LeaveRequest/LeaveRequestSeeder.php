<?php

namespace Modules\AttendanceTracking\Database\Seeders\LeaveRequest;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\LeaveRequest;

class LeaveRequestSeeder extends Seeder
{
    public function run(): void
    {
        $leave_requests = [
            [
                'employee_id' => 1,
                'holidays_list_id' => 3,
                'start_date' => '2013-09-25',
                'end_date' => '2013-09-25',
                'request_status' => 'approved',
                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 2,
                'holidays_list_id' => 2,
                'start_date' => '2013-09-25',
                'end_date' => '2018-09-25',
                'request_status' => 'approved',
                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 2,
                'holidays_list_id' => 2,
                'start_date' => '2014-09-25',
                'end_date' => '2013-09-25',
                'request_status' => 'approved',
                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 2,
                'holidays_list_id' => 3,
                'start_date' => '2019-09-25',
                'end_date' => '2012-09-25',
                'request_status' => 'approved',
                'attendance_attachments_id'=>123,

            ],
            [
                'employee_id' => 2,
                'holidays_list_id' => 1,
                'start_date' => '2013-09-25',
                'end_date' => '2015-09-25',
                'request_status' => 'approved',
                'attendance_attachments_id'=>123,

            ],
        ];

        foreach ($leave_requests as $data) {
            LeaveRequest::firstOrCreate($data);
        }
    }
}
