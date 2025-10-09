<?php

namespace Modules\Employee\Database\Seeders\EmployeeHoliday;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeHoliday;

class EmployeeHolidaySeeder extends Seeder
{
    public function run(): void
    {
        $employee_holidays = [
            [
                'employee_id' => 2,
                'total_balance' => 302,
                'remaining_balance' => 635,
                'holiday_list_id' => 3,
                'status' => 'Sample status 1',
                'list' => [
                    'en' => 'Sample list 1',
                    'ar' => 'عينة list 1'
                ],
            ],
            [
                'employee_id' => 3,
                'total_balance' => 198,
                'remaining_balance' => 555,
                'holiday_list_id' => 1,
                'status' => 'Sample status 2',
                'list' => [
                    'en' => 'Sample list 2',
                    'ar' => 'عينة list 2'
                ],
            ],
            [
                'employee_id' => 3,
                'total_balance' => 261,
                'remaining_balance' => 508,
                'holiday_list_id' => 2,
                'status' => 'Sample status 3',
                'list' => [
                    'en' => 'Sample list 3',
                    'ar' => 'عينة list 3'
                ],
            ],
            [
                'employee_id' => 3,
                'total_balance' => 956,
                'remaining_balance' => 921,
                'holiday_list_id' => 3,
                'status' => 'Sample status 4',
                'list' => [
                    'en' => 'Sample list 4',
                    'ar' => 'عينة list 4'
                ],
            ],
            [
                'employee_id' => 3,
                'total_balance' => 610,
                'remaining_balance' => 804,
                'holiday_list_id' => 3,
                'status' => 'Sample status 5',
                'list' => [
                    'en' => 'Sample list 5',
                    'ar' => 'عينة list 5'
                ],
            ],
        ];

        foreach ($employee_holidays as $data) {
            // EmployeeHoliday::firstOrCreate($data);
        }
    }
}
