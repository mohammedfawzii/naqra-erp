<?php

namespace Modules\Employee\Database\Seeders\EmployeeExperience;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeExperience;

class EmployeeExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $employee_experiences = [
            [
                'employee_id' => 2,
                'entity_name' => 'Sample entity_name 1',
                'job_title' => [
                    'en' => 'Sample job_title 1',
                    'ar' => 'عينة job_title 1'
                ],
                'start_date' => '2020-10-07',
                'end_date' => '2015-10-07',
                'volunteer_experiences' => 'Sample volunteer_experiences 1',
                'unofficial_experiences' => 'Sample unofficial_experiences 1',
                'previous_salary' => 'Sample previous_salary 1',
                'previous_evaluation' => 'Sample previous_evaluation 1',
                'leaving_reason' => 'Sample leaving_reason 1',
                'responsibilities' => 'Sample responsibilities 1',
                'notes' => 'Sample notes 1',
            ],
            [
                'employee_id' => 3,
                'entity_name' => 'Sample entity_name 2',
                'job_title' => [
                    'en' => 'Sample job_title 2',
                    'ar' => 'عينة job_title 2'
                ],
                'start_date' => '2015-10-07',
                'end_date' => '2019-10-07',
                'volunteer_experiences' => 'Sample volunteer_experiences 2',
                'unofficial_experiences' => 'Sample unofficial_experiences 2',
                'previous_salary' => 'Sample previous_salary 2',
                'previous_evaluation' => 'Sample previous_evaluation 2',
                'leaving_reason' => 'Sample leaving_reason 2',
                'responsibilities' => 'Sample responsibilities 2',
                'notes' => 'Sample notes 2',
            ],
            [
                'employee_id' => 2,
                'entity_name' => 'Sample entity_name 3',
                'job_title' => [
                    'en' => 'Sample job_title 3',
                    'ar' => 'عينة job_title 3'
                ],
                'start_date' => '2024-10-07',
                'end_date' => '2018-10-07',
                'volunteer_experiences' => 'Sample volunteer_experiences 3',
                'unofficial_experiences' => 'Sample unofficial_experiences 3',
                'previous_salary' => 'Sample previous_salary 3',
                'previous_evaluation' => 'Sample previous_evaluation 3',
                'leaving_reason' => 'Sample leaving_reason 3',
                'responsibilities' => 'Sample responsibilities 3',
                'notes' => 'Sample notes 3',
            ],
            [
                'employee_id' => 3,
                'entity_name' => 'Sample entity_name 4',
                'job_title' => [
                    'en' => 'Sample job_title 4',
                    'ar' => 'عينة job_title 4'
                ],
                'start_date' => '2011-10-07',
                'end_date' => '2013-10-07',
                'volunteer_experiences' => 'Sample volunteer_experiences 4',
                'unofficial_experiences' => 'Sample unofficial_experiences 4',
                'previous_salary' => 'Sample previous_salary 4',
                'previous_evaluation' => 'Sample previous_evaluation 4',
                'leaving_reason' => 'Sample leaving_reason 4',
                'responsibilities' => 'Sample responsibilities 4',
                'notes' => 'Sample notes 4',
            ],
            [
                'employee_id' => 3,
                'entity_name' => 'Sample entity_name 5',
                'job_title' => [
                    'en' => 'Sample job_title 5',
                    'ar' => 'عينة job_title 5'
                ],
                'start_date' => '2022-10-07',
                'end_date' => '2009-10-07',
                'volunteer_experiences' => 'Sample volunteer_experiences 5',
                'unofficial_experiences' => 'Sample unofficial_experiences 5',
                'previous_salary' => 'Sample previous_salary 5',
                'previous_evaluation' => 'Sample previous_evaluation 5',
                'leaving_reason' => 'Sample leaving_reason 5',
                'responsibilities' => 'Sample responsibilities 5',
                'notes' => 'Sample notes 5',
            ],
        ];

        foreach ($employee_experiences as $data) {
            EmployeeExperience::firstOrCreate($data);
        }
    }
}
