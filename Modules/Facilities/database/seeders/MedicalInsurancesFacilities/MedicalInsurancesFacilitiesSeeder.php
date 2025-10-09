<?php

namespace Modules\Facilities\Database\Seeders\MedicalInsurancesFacilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\MedicalInsurancesFacilities;

class MedicalInsurancesFacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        $medical_insurances_facilities = [
            [
                'avater' => 'Sample avater 1',
                'company_name' => 'Sample company_name 1',
                'policy_number' => 'Sample policy_number 1',
                'medical_insurance_categories_id' => 1,
                'start_date' => '2016-10-08',
                'end_date' => '2019-10-08',
            ],
            [
                'avater' => 'Sample avater 2',
                'company_name' => 'Sample company_name 2',
                'policy_number' => 'Sample policy_number 2',
                'medical_insurance_categories_id' => 1,
                'start_date' => '2015-10-08',
                'end_date' => '2023-10-08',
            ],
            [
                'avater' => 'Sample avater 3',
                'company_name' => 'Sample company_name 3',
                'policy_number' => 'Sample policy_number 3',
                'medical_insurance_categories_id' => 2,
                'start_date' => '2009-10-08',
                'end_date' => '2024-10-08',
            ],
            [
                'avater' => 'Sample avater 4',
                'company_name' => 'Sample company_name 4',
                'policy_number' => 'Sample policy_number 4',
                'medical_insurance_categories_id' => 2,
                'start_date' => '2022-10-08',
                'end_date' => '2020-10-08',
            ],
            [
                'avater' => 'Sample avater 5',
                'company_name' => 'Sample company_name 5',
                'policy_number' => 'Sample policy_number 5',
                'medical_insurance_categories_id' => 2,
                'start_date' => '2009-10-08',
                'end_date' => '2012-10-08',
            ],
        ];

        foreach ($medical_insurances_facilities as $data) {
            MedicalInsurancesFacilities::firstOrCreate($data);
        }
    }
}
