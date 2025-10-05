<?php

namespace Modules\Facilities\Database\Seeders\Owner;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Owner;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        Owner::firstOrCreate([
                'full_name' => 'Sample Name 1',
                'owner_type_id' => '1',
                'national_id_number' => 'Sample national_id_number 1',
                'job_title_id' => '1',
                'date_of_birth' => '2002-09-20',
                'gender' => 'Female',
                'country_id' => '2',
                'city_id' => '3',
                'company_details' => 'Sample company_details 1',
        ]);

        Owner::firstOrCreate([
                'full_name' => 'Sample Name 2',
                'owner_type_id' => '2',
                'national_id_number' => 'Sample national_id_number 2',
                'job_title_id' => '2',
                'date_of_birth' => '1982-09-20',
                'gender' => 'Male',
                'country_id' => '1',
                'city_id' => '2',
                'company_details' => 'Sample company_details 2',
        ]);

        Owner::firstOrCreate([
                'full_name' => 'Sample Name 3',
                'owner_type_id' => '3',
                'national_id_number' => 'Sample national_id_number 3',
                'job_title_id' => '3',
                'date_of_birth' => '2003-09-20',
                'gender' => 'Female',
                'country_id' => '1',
                'city_id' => '2',
                'company_details' => 'Sample company_details 3',
        ]);

        Owner::firstOrCreate([
                'full_name' => 'Sample Name 4',
                'owner_type_id' => '4',
                'national_id_number' => 'Sample national_id_number 4',
                'job_title_id' => '4',
                'date_of_birth' => '1982-09-20',
                'gender' => 'Male',
                'country_id' => '1',
                'city_id' => '2',
                'company_details' => 'Sample company_details 4',
        ]);

        Owner::firstOrCreate([
                'full_name' => 'Sample Name 5',
                'owner_type_id' => '5',
                'national_id_number' => 'Sample national_id_number 5',
                'job_title_id' => '5',
                'date_of_birth' => '1993-09-20',
                'gender' => 'Female',
                'country_id' => '1',
                'city_id' => '4',
                'company_details' => 'Sample company_details 5',
        ]);

    }
}
