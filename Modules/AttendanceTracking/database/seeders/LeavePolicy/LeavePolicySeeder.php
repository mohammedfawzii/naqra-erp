<?php

namespace Modules\AttendanceTracking\Database\Seeders\LeavePolicy;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\LeavePolicy;

class LeavePolicySeeder extends Seeder
{
    public function run(): void
    {
        $leave_policies = [
            [
                'holidays_list_id' => 3,
                'policy_description' => 'Sample policy_description 1',
                'annual_balance' => 435,
                'attendance_attachments_id' => 123,
            ],
            [
                'holidays_list_id' => 3,
                'policy_description' => 'Sample policy_description 2',
                'annual_balance' => 716,
                'attendance_attachments_id' => 123,
            ],
            [
                'holidays_list_id' => 1,
                'policy_description' => 'Sample policy_description 3',
                'annual_balance' => 145,
                'attendance_attachments_id' => 3,
            ],
            [
                'holidays_list_id' => 1,
                'policy_description' => 'Sample policy_description 4',
                'annual_balance' => 2,
                'attendance_attachments_id' => 3,
            ],
            [
                'holidays_list_id' => 1,
                'policy_description' => 'Sample policy_description 5',
                'annual_balance' => 901,
                'attendance_attachments_id' => 3,
            ],
        ];

        foreach ($leave_policies as $data) {
            LeavePolicy::firstOrCreate($data);
        }
    }
}
