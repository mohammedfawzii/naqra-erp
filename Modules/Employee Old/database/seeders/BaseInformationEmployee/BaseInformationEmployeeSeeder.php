<?php

namespace Modules\Employee\Database\Seeders\BaseInformationEmployee;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\BaseInformationEmployee;

class BaseInformationEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $base_information_employees = [
            [
                'employee_id' => 1,
                'avatar' => 'Sample avatar 1',
                'hire_date' => '2022-10-07',
                'job_title' => 'Sample job_title 1',
                'position' => 'Sample position 1',
                'department_id' => 1,
                'start_hire' => '2006-10-07',
                'end_hire' => '2007-10-07',
                'retirement_date' => '2009-10-07',
                'notice_period_id' => 2,
                'trial_period_id' => 2,
                'direct_manager_id' => 2,
                'holiday_manager_id' => 3,
                'salary_manager_id' => 2,
                'status' => 'hire',
            ],
            [
                'employee_id' => 1,
                'avatar' => 'Sample avatar 2',
                'hire_date' => '2013-10-07',
                'job_title' => 'Sample job_title 2',
                'position' => 'Sample position 2',
                'department_id' => 3,
                'start_hire' => '2008-10-07',
                'end_hire' => '2022-10-07',
                'retirement_date' => '2018-10-07',
                'notice_period_id' => 3,
                'trial_period_id' => 2,
                'direct_manager_id' => 1,
                'holiday_manager_id' => 2,
                'salary_manager_id' => 2,
                'status' => 'hire',
            ],
            [
                'employee_id' => 1,
                'avatar' => 'Sample avatar 3',
                'hire_date' => '2005-10-07',
                'job_title' => 'Sample job_title 3',
                'position' => 'Sample position 3',
                'department_id' => 2,
                'start_hire' => '2012-10-07',
                'end_hire' => '2013-10-07',
                'retirement_date' => '2005-10-07',
                'notice_period_id' => 2,
                'trial_period_id' => 3,
                'direct_manager_id' => 1,
                'holiday_manager_id' => 2,
                'salary_manager_id' => 3,
                'status' => 'hire',
            ],
            [
                'employee_id' => 1,
                'avatar' => 'Sample avatar 4',
                'hire_date' => '2017-10-07',
                'job_title' => 'Sample job_title 4',
                'position' => 'Sample position 4',
                'department_id' => 3,
                'start_hire' => '2017-10-07',
                'end_hire' => '2020-10-07',
                'retirement_date' => '2011-10-07',
                'notice_period_id' => 1,
                'trial_period_id' => 1,
                'direct_manager_id' => 3,
                'holiday_manager_id' => 3,
                'salary_manager_id' => 3,
                'status' => 'hire',
            ],
            [
                'employee_id' => 1,
                'avatar' => 'Sample avatar 5',
                'hire_date' => '2020-10-07',
                'job_title' => 'Sample job_title 5',
                'position' => 'Sample position 5',
                'department_id' => 1,
                'start_hire' => '2010-10-07',
                'end_hire' => '2015-10-07',
                'retirement_date' => '2012-10-07',
                'notice_period_id' => 1,
                'trial_period_id' => 3,
                'direct_manager_id' => 3,
                'holiday_manager_id' => 3,
                'salary_manager_id' => 1,
                'status' => 'hire',
            ],
        ];

        foreach ($base_information_employees as $data) {
            BaseInformationEmployee::firstOrCreate($data);
        }
    }
}
