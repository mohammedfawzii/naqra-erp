<?php

namespace Modules\AttendanceTracking\Database\Seeders\LeaveBalance;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\LeaveBalance;

class LeaveBalanceSeeder extends Seeder
{
    public function run(): void
    {
        $leave_balances = [
            [
                'employee_id' => 2,
                'holidays_list_id' => 1,
                'available_balance' => 560,
                'used_balance' => 570,
                'attendance_attachments_id' => 123,
            ],
            [
                'employee_id' => 3,
                'holidays_list_id' => 3,
                'available_balance' => 352,
                'used_balance' => 863,
                'attendance_attachments_id' => 123,
            ],
            [
                'employee_id' => 1,
                'holidays_list_id' => 2,
                'available_balance' => 597,
                'used_balance' => 740,
                'attendance_attachments_id' => 123,
            ],
            [
                'employee_id' => 1,
                'holidays_list_id' => 1,
                'available_balance' => 382,
                'used_balance' => 338,
                'attendance_attachments_id' => 123,
            ],
            [
                'employee_id' => 3,
                'holidays_list_id' => 3,
                'available_balance' => 136,
                'used_balance' => 594,
                'attendance_attachments_id' => 123,
            ],
        ];

        foreach ($leave_balances as $data) {
            LeaveBalance::firstOrCreate($data);
        }
    }
}
