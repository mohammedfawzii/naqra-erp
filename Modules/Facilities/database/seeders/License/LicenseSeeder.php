<?php

namespace Modules\Facilities\Database\Seeders\License;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\License;

class LicenseSeeder extends Seeder
{
    public function run(): void
    {
        License::firstOrCreate([
            'ministry_name_id' => '1',
            'license_address' => 'Sample license_address 1',
            'license_number' => '4545',
            'license_type_id' => '1',
            'license_value' => '5551',
            'branch_area' => 'Sample branch_area 1',
            'license_start_date' => '2004-09-20',
            'license_end_date' => '2009-09-20',
            'branch_id' => '3',
            'facility_attachments_id' => '1'
        ]);

        License::firstOrCreate([
            'ministry_name_id' => '2',
            'license_address' => 'Sample license_address 2',
            'license_number' => 'Sample license_number 2',
            'license_type_id' => '2',
            'license_value' => 'Sample license_value 2',
            'branch_area' => 'Sample branch_area 2',
            'license_start_date' => '2000-09-20',
            'license_end_date' => '1995-09-20',
            'branch_id' => '6',
            'facility_attachments_id' => '1'

        ]);

        License::firstOrCreate([
            'ministry_name_id' => '3',
            'license_address' => 'Sample license_address 3',
            'license_number' => 'Sample license_number 3',
            'license_type_id' => '3',
            'license_value' => 'Sample license_value 3',
            'branch_area' => 'Sample branch_area 3',
            'license_start_date' => '1980-09-20',
            'license_end_date' => '2003-09-20',
            'branch_id' => '6',
            'facility_attachments_id' => '1'

        ]);

        License::firstOrCreate([
            'ministry_name_id' => '4',
            'license_address' => 'Sample license_address 4',
            'license_number' => 'Sample license_number 4',
            'license_type_id' => '4',
            'license_value' => 'Sample license_value 4',
            'branch_area' => 'Sample branch_area 4',
            'license_start_date' => '1995-09-20',
            'license_end_date' => '1976-09-20',
            'branch_id' => '1',
            'facility_attachments_id' => '1'

        ]);

        License::firstOrCreate([
            'ministry_name_id' => '5',
            'license_address' => 'Sample license_address 5',
            'license_number' => 'Sample license_number 5',
            'license_type_id' => '5',
            'license_value' => 'Sample license_value 5',
            'branch_area' => 'Sample branch_area 5',
            'license_start_date' => '1988-09-20',
            'license_end_date' => '1975-09-20',
            'branch_id' => '1',
            'facility_attachments_id' => '1'
        ]);
    }
}
