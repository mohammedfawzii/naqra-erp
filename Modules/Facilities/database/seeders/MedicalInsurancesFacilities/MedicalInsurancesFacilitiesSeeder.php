<?php

namespace Modules\Facilities\Database\Seeders\MedicalInsurancesFacilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\MedicalInsurancesFacilities;

class MedicalInsurancesFacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        MedicalInsurancesFacilities::firstOrCreate([
                'company_name' => 'Sample company_name 1',
                'policy_number' => 'Sample policy_number 1',
                'medical_insurance_categories_id' => '1',
                'start_date' => '2002-09-20',
                'end_date' => '1989-09-20',
        ]);

        MedicalInsurancesFacilities::firstOrCreate([
                'company_name' => 'Sample company_name 2',
                'policy_number' => 'Sample policy_number 2',
                'medical_insurance_categories_id' => '2',
                'start_date' => '1979-09-20',
                'end_date' => '1990-09-20',
        ]);

        MedicalInsurancesFacilities::firstOrCreate([
                'company_name' => 'Sample company_name 3',
                'policy_number' => 'Sample policy_number 3',
                'medical_insurance_categories_id' => '3',
                'start_date' => '2009-09-20',
                'end_date' => '2010-09-20',
        ]);

        MedicalInsurancesFacilities::firstOrCreate([
                'company_name' => 'Sample company_name 4',
                'policy_number' => 'Sample policy_number 4',
                'medical_insurance_categories_id' => '4',
                'start_date' => '2009-09-20',
                'end_date' => '1999-09-20',
        ]);

        MedicalInsurancesFacilities::firstOrCreate([
                'company_name' => 'Sample company_name 5',
                'policy_number' => 'Sample policy_number 5',
                'medical_insurance_categories_id' => '5',
                'start_date' => '2001-09-20',
                'end_date' => '1987-09-20',
        ]);

    }
}
