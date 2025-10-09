<?php

namespace Modules\Employee\Database\Seeders\EmployeeDebendent;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeDebendent;

class EmployeeDebendentSeeder extends Seeder
{
    public function run(): void
    {
        $employee_debendents = [
            [
                'employee_id' => 1,
                'full_name' => [
                    'en' => 'Sample full_name 1',
                    'ar' => 'عينة full_name 1'
                ],
                'relationship' => 'son',
                'birth_date' => '2005-10-07',
                'birth_place' => 'Sample birth_place 1',
                'nationality_id' => 2,
                'gender' => 'male',
                'national_id_number' => 'Sample national_id_number 1',
                'id_issue_date' => '2011-10-07',
                'id_expiry_date' => '2014-10-07',
                'mobile_number' => 'Sample mobile_number 1',
                'passport_number' => 'Sample passport_number 1',
                'passport_issue_date' => '2011-10-07',
                'passport_expiry_date' => '2014-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 1',
                'health_status' => 'Sample health_status 1',
                'medical_test_status' => 'Sample medical_test_status 1',
                'notes' => 'Sample notes 1',
            ],
            [
                'employee_id' => 2,
                'full_name' => [
                    'en' => 'Sample full_name 2',
                    'ar' => 'عينة full_name 2'
                ],
                'relationship' => 'son',
                'birth_date' => '2023-10-07',
                'birth_place' => 'Sample birth_place 2',
                'nationality_id' => 3,
                'gender' => 'male',
                'national_id_number' => 'Sample national_id_number 2',
                'id_issue_date' => '2011-10-07',
                'id_expiry_date' => '2024-10-07',
                'mobile_number' => 'Sample mobile_number 2',
                'passport_number' => 'Sample passport_number 2',
                'passport_issue_date' => '2016-10-07',
                'passport_expiry_date' => '2016-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 2',
                'health_status' => 'Sample health_status 2',
                'medical_test_status' => 'Sample medical_test_status 2',
                'notes' => 'Sample notes 2',
            ],
            [
                'employee_id' => 1,
                'full_name' => [
                    'en' => 'Sample full_name 3',
                    'ar' => 'عينة full_name 3'
                ],
                'relationship' => 'son',
                'birth_date' => '2013-10-07',
                'birth_place' => 'Sample birth_place 3',
                'nationality_id' => 1,
                'gender' => 'male',
                'national_id_number' => 'Sample national_id_number 3',
                'id_issue_date' => '2024-10-07',
                'id_expiry_date' => '2023-10-07',
                'mobile_number' => 'Sample mobile_number 3',
                'passport_number' => 'Sample passport_number 3',
                'passport_issue_date' => '2013-10-07',
                'passport_expiry_date' => '2016-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 3',
                'health_status' => 'Sample health_status 3',
                'medical_test_status' => 'Sample medical_test_status 3',
                'notes' => 'Sample notes 3',
            ],
            [
                'employee_id' => 1,
                'full_name' => [
                    'en' => 'Sample full_name 4',
                    'ar' => 'عينة full_name 4'
                ],
                'relationship' => 'son',
                'birth_date' => '2022-10-07',
                'birth_place' => 'Sample birth_place 4',
                'nationality_id' => 1,
                'gender' => 'male',
                'national_id_number' => 'Sample national_id_number 4',
                'id_issue_date' => '2009-10-07',
                'id_expiry_date' => '2019-10-07',
                'mobile_number' => 'Sample mobile_number 4',
                'passport_number' => 'Sample passport_number 4',
                'passport_issue_date' => '2013-10-07',
                'passport_expiry_date' => '2018-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 4',
                'health_status' => 'Sample health_status 4',
                'medical_test_status' => 'Sample medical_test_status 4',
                'notes' => 'Sample notes 4',
            ],
            [
                'employee_id' => 1,
                'full_name' => [
                    'en' => 'Sample full_name 5',
                    'ar' => 'عينة full_name 5'
                ],
                'relationship' => 'son',
                'birth_date' => '2016-10-07',
                'birth_place' => 'Sample birth_place 5',
                'nationality_id' => 3,
                'gender' => 'male',
                'national_id_number' => 'Sample national_id_number 5',
                'id_issue_date' => '2006-10-07',
                'id_expiry_date' => '2021-10-07',
                'mobile_number' => 'Sample mobile_number 5',
                'passport_number' => 'Sample passport_number 5',
                'passport_issue_date' => '2006-10-07',
                'passport_expiry_date' => '2023-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 5',
                'health_status' => 'Sample health_status 5',
                'medical_test_status' => 'Sample medical_test_status 5',
                'notes' => 'Sample notes 5',
            ],
        ];

        foreach ($employee_debendents as $data) {
            EmployeeDebendent::firstOrCreate($data);
        }
    }
}
