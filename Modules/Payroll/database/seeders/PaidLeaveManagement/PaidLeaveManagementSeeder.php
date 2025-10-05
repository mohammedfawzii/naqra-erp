<?php

namespace Modules\Payroll\Database\Seeders\PaidLeaveManagement;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PaidLeaveManagement;

class PaidLeaveManagementSeeder extends Seeder
{
    public function run(): void
    {
        $paid_leave_management = [
            [
                'employee_id' => 1,
                'holidays_lists_id' => 2,
                'leave_balance' => 66.59,
                'leave_date' => '2009-09-22',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 1,
                'holidays_lists_id' => 3,
                'leave_balance' => 93.76,
                'leave_date' => '2018-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 3,
                'holidays_lists_id' => 2,
                'leave_balance' => 87.90,
                'leave_date' => '2011-09-22',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'holidays_lists_id' => 3,
                'leave_balance' => 35.54,
                'leave_date' => '2007-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 1,
                'holidays_lists_id' => 1,
                'leave_balance' => 66.93,
                'leave_date' => '2021-09-22',
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($paid_leave_management as $data) {
            PaidLeaveManagement::firstOrCreate($data);
        }
    }
}
