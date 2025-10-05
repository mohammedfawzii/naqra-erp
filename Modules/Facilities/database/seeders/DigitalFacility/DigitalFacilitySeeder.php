<?php

namespace Modules\Facilities\Database\Seeders\DigitalFacility;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\DigitalFacility;

class DigitalFacilitySeeder extends Seeder
{
    public function run(): void
    {
        DigitalFacility::firstOrCreate([
                'name' => 'Sample name 1',
                'total_employees' => '100',
                'unified_national_number' => '12121212',
                'tax_number' => 'Sample tax_number 1',
                'commercial_record_value' => '1',
                'capital' => '1',
                'start_date' => '2007-09-20',
                'annual_confirmation_date' => '2000-09-20',
                'financial_year_start' => '1983-09-20',
                'financial_year_end' => '1977-09-20',
                'facility_attachments_id' => '1',
        ]);

        DigitalFacility::firstOrCreate([
                  'name' => 'Sample name 1',
                'total_employees' => '100',
                'unified_national_number' => '12121212',
                'tax_number' => 'Sample tax_number 1',
                'commercial_record_value' => '1',
                'capital' => '1',
                'start_date' => '2007-09-20',
                'annual_confirmation_date' => '2000-09-20',
                'financial_year_start' => '1983-09-20',
                'financial_year_end' => '1977-09-20',
                'facility_attachments_id' => '1',
        ]);

        DigitalFacility::firstOrCreate([
         'name' => 'Sample name 1',
                'total_employees' => '100',
                'unified_national_number' => '12121212',
                'tax_number' => 'Sample tax_number 1',
                'commercial_record_value' => '1',
                'capital' => '1',
                'start_date' => '2007-09-20',
                'annual_confirmation_date' => '2000-09-20',
                'financial_year_start' => '1983-09-20',
                'financial_year_end' => '1977-09-20',
                'facility_attachments_id' => '1',
        ]);



    }
}
