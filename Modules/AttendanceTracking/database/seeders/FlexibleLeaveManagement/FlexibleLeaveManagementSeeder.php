<?php

namespace Modules\AttendanceTracking\Database\Seeders\FlexibleLeaveManagement;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\FlexibleLeaveManagement;

class FlexibleLeaveManagementSeeder extends Seeder
{
    public function run(): void
    {
        $flexible_leave_management = [
            [
                'employee_id' => 1,
                'selected_leaves' => 'Sample selected_leaves 1',
                'leave_cost' => 81.68,
                'holidays_list_id' => 2,
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 3,
                'selected_leaves' => 'Sample selected_leaves 2',
                'leave_cost' => 37.75,
                'holidays_list_id' => 2,
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 2,
                'selected_leaves' => 'Sample selected_leaves 3',
                'leave_cost' => 16.33,
                'holidays_list_id' => 3,
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 3,
                'selected_leaves' => 'Sample selected_leaves 4',
                'leave_cost' => 43.31,
                'holidays_list_id' => 1,
                                'attendance_attachments_id' => 123,

            ],
            [
                'employee_id' => 3,
                'selected_leaves' => 'Sample selected_leaves 5',
                'leave_cost' => 37.14,
                'holidays_list_id' => 3,
            ],
        ];

        foreach ($flexible_leave_management as $data) {
            FlexibleLeaveManagement::firstOrCreate($data);
        }
    }
}
