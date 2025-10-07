<?php

namespace Modules\Employee\Database\Seeders\PersonalInformationEmployee;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\PersonalInformationEmployee;

class PersonalInformationEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $personal_information_employees = [
            [
                'employee_id' => 1,
                'first_name' => [
                    'en' => 'Sample first_name 1',
                    'ar' => 'عينة first_name 1'
                ],
                'second_name' => [
                    'en' => 'Sample second_name 1',
                    'ar' => 'عينة second_name 1'
                ],
                'therd_name' => [
                    'en' => 'Sample therd_name 1',
                    'ar' => 'عينة therd_name 1'
                ],
                'family_name' => [
                    'en' => 'Sample family_name 1',
                    'ar' => 'عينة family_name 1'
                ],
                'nationality_id' => 1,
                'marital_status' => 'single',
                'marriage_date' => '2010-10-07',
                'gender' => 'male',
                'birth_date' => '2009-10-07',
                'place_of_birth' => 'Sample place_of_birth 1',
                'national_id_number' => 'Sample national_id_number 1',
                'national_id_expiry' => '2014-10-07',
                'religion_id' => 2,
                'passport_type' => 'Sample passport_type 1',
                'passport_number' => 'Sample passport_number 1',
                'passport_issue_date' => '2014-10-07',
                'passport_expiry_date' => '2012-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 1',
                'passport_validity' => 'Sample passport_validity 1',
                'work_card_number' => 'Sample work_card_number 1',
                'work_card_issue_date' => '2021-10-07',
                'work_card_expiry_date' => '2014-10-07',
                'work_card_fee' => 'Sample work_card_fee 1',
                'iqama_number' => 'Sample iqama_number 1',
                'iqama_issue_date' => '2012-10-07',
                'iqama_expiry_date' => '2008-10-07',
                'iqama_fee' => 'Sample iqama_fee 1',
                'document_type' => 'Sample document_type 1',
            ],
            [
                'employee_id' => 2,
                'first_name' => [
                    'en' => 'Sample first_name 2',
                    'ar' => 'عينة first_name 2'
                ],
                'second_name' => [
                    'en' => 'Sample second_name 2',
                    'ar' => 'عينة second_name 2'
                ],
                'therd_name' => [
                    'en' => 'Sample therd_name 2',
                    'ar' => 'عينة therd_name 2'
                ],
                'family_name' => [
                    'en' => 'Sample family_name 2',
                    'ar' => 'عينة family_name 2'
                ],
                'nationality_id' => 3,
                'marital_status' => 'single',
                'marriage_date' => '2020-10-07',
                'gender' => 'male',
                'birth_date' => '2006-10-07',
                'place_of_birth' => 'Sample place_of_birth 2',
                'national_id_number' => 'Sample national_id_number 2',
                'national_id_expiry' => '2012-10-07',
                'religion_id' => 2,
                'passport_type' => 'Sample passport_type 2',
                'passport_number' => 'Sample passport_number 2',
                'passport_issue_date' => '2008-10-07',
                'passport_expiry_date' => '2006-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 2',
                'passport_validity' => 'Sample passport_validity 2',
                'work_card_number' => 'Sample work_card_number 2',
                'work_card_issue_date' => '2006-10-07',
                'work_card_expiry_date' => '2010-10-07',
                'work_card_fee' => 'Sample work_card_fee 2',
                'iqama_number' => 'Sample iqama_number 2',
                'iqama_issue_date' => '2023-10-07',
                'iqama_expiry_date' => '2006-10-07',
                'iqama_fee' => 'Sample iqama_fee 2',
                'document_type' => 'Sample document_type 2',
            ],
            [
                'employee_id' => 3,
                'first_name' => [
                    'en' => 'Sample first_name 3',
                    'ar' => 'عينة first_name 3'
                ],
                'second_name' => [
                    'en' => 'Sample second_name 3',
                    'ar' => 'عينة second_name 3'
                ],
                'therd_name' => [
                    'en' => 'Sample therd_name 3',
                    'ar' => 'عينة therd_name 3'
                ],
                'family_name' => [
                    'en' => 'Sample family_name 3',
                    'ar' => 'عينة family_name 3'
                ],
                'nationality_id' => 1,
                'marital_status' => 'single',
                'marriage_date' => '2008-10-07',
                'gender' => 'male',
                'birth_date' => '2011-10-07',
                'place_of_birth' => 'Sample place_of_birth 3',
                'national_id_number' => 'Sample national_id_number 3',
                'national_id_expiry' => '2020-10-07',
                'religion_id' => 3,
                'passport_type' => 'Sample passport_type 3',
                'passport_number' => 'Sample passport_number 3',
                'passport_issue_date' => '2005-10-07',
                'passport_expiry_date' => '2008-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 3',
                'passport_validity' => 'Sample passport_validity 3',
                'work_card_number' => 'Sample work_card_number 3',
                'work_card_issue_date' => '2016-10-07',
                'work_card_expiry_date' => '2006-10-07',
                'work_card_fee' => 'Sample work_card_fee 3',
                'iqama_number' => 'Sample iqama_number 3',
                'iqama_issue_date' => '2023-10-07',
                'iqama_expiry_date' => '2009-10-07',
                'iqama_fee' => 'Sample iqama_fee 3',
                'document_type' => 'Sample document_type 3',
            ],
            [
                'employee_id' => 2,
                'first_name' => [
                    'en' => 'Sample first_name 4',
                    'ar' => 'عينة first_name 4'
                ],
                'second_name' => [
                    'en' => 'Sample second_name 4',
                    'ar' => 'عينة second_name 4'
                ],
                'therd_name' => [
                    'en' => 'Sample therd_name 4',
                    'ar' => 'عينة therd_name 4'
                ],
                'family_name' => [
                    'en' => 'Sample family_name 4',
                    'ar' => 'عينة family_name 4'
                ],
                'nationality_id' => 1,
                'marital_status' => 'single',
                'marriage_date' => '2009-10-07',
                'gender' => 'male',
                'birth_date' => '2005-10-07',
                'place_of_birth' => 'Sample place_of_birth 4',
                'national_id_number' => 'Sample national_id_number 4',
                'national_id_expiry' => '2007-10-07',
                'religion_id' => 1,
                'passport_type' => 'Sample passport_type 4',
                'passport_number' => 'Sample passport_number 4',
                'passport_issue_date' => '2014-10-07',
                'passport_expiry_date' => '2017-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 4',
                'passport_validity' => 'Sample passport_validity 4',
                'work_card_number' => 'Sample work_card_number 4',
                'work_card_issue_date' => '2013-10-07',
                'work_card_expiry_date' => '2008-10-07',
                'work_card_fee' => 'Sample work_card_fee 4',
                'iqama_number' => 'Sample iqama_number 4',
                'iqama_issue_date' => '2016-10-07',
                'iqama_expiry_date' => '2014-10-07',
                'iqama_fee' => 'Sample iqama_fee 4',
                'document_type' => 'Sample document_type 4',
            ],
            [
                'employee_id' => 1,
                'first_name' => [
                    'en' => 'Sample first_name 5',
                    'ar' => 'عينة first_name 5'
                ],
                'second_name' => [
                    'en' => 'Sample second_name 5',
                    'ar' => 'عينة second_name 5'
                ],
                'therd_name' => [
                    'en' => 'Sample therd_name 5',
                    'ar' => 'عينة therd_name 5'
                ],
                'family_name' => [
                    'en' => 'Sample family_name 5',
                    'ar' => 'عينة family_name 5'
                ],
                'nationality_id' => 3,
                'marital_status' => 'single',
                'marriage_date' => '2007-10-07',
                'gender' => 'male',
                'birth_date' => '2007-10-07',
                'place_of_birth' => 'Sample place_of_birth 5',
                'national_id_number' => 'Sample national_id_number 5',
                'national_id_expiry' => '2018-10-07',
                'religion_id' => 3,
                'passport_type' => 'Sample passport_type 5',
                'passport_number' => 'Sample passport_number 5',
                'passport_issue_date' => '2015-10-07',
                'passport_expiry_date' => '2013-10-07',
                'passport_issue_place' => 'Sample passport_issue_place 5',
                'passport_validity' => 'Sample passport_validity 5',
                'work_card_number' => 'Sample work_card_number 5',
                'work_card_issue_date' => '2018-10-07',
                'work_card_expiry_date' => '2018-10-07',
                'work_card_fee' => 'Sample work_card_fee 5',
                'iqama_number' => 'Sample iqama_number 5',
                'iqama_issue_date' => '2014-10-07',
                'iqama_expiry_date' => '2017-10-07',
                'iqama_fee' => 'Sample iqama_fee 5',
                'document_type' => 'Sample document_type 5',
            ],
        ];

        foreach ($personal_information_employees as $data) {
            PersonalInformationEmployee::firstOrCreate($data);
        }
    }
}
