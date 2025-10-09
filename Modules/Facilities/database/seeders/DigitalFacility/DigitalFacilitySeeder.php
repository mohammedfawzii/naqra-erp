<?php

namespace Modules\Facilities\Database\Seeders\DigitalFacility;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\DigitalFacility;

class DigitalFacilitySeeder extends Seeder
{
    public function run(): void
    {
        $digital_facilities = [
            [
                'branch_id' => 2,
                'name' => 'Sample name 1',
                'unified_national_number' => 'Sample unified_national_number 1',
                'tax_number' => 'Sample tax_number 1',
                'commercial_record_value' => 811,
                'capital' => 302,
                'start_date' => '2012-10-08',
                'annual_confirmation_date' => '2018-10-08',
                'financial_year_start' => '2015-10-08',
                'financial_year_end' => '2019-10-08',
            ],
            [
                'branch_id' => 3,
                'name' => 'Sample name 2',
                'unified_national_number' => 'Sample unified_national_number 2',
                'tax_number' => 'Sample tax_number 2',
                'commercial_record_value' => 869,
                'capital' => 269,
                'start_date' => '2015-10-08',
                'annual_confirmation_date' => '2021-10-08',
                'financial_year_start' => '2006-10-08',
                'financial_year_end' => '2012-10-08',
            ],
            [
                'branch_id' => 2,
                'name' => 'Sample name 3',
                'unified_national_number' => 'Sample unified_national_number 3',
                'tax_number' => 'Sample tax_number 3',
                'commercial_record_value' => 361,
                'capital' => 306,
                'start_date' => '2010-10-08',
                'annual_confirmation_date' => '2022-10-08',
                'financial_year_start' => '2006-10-08',
                'financial_year_end' => '2011-10-08',
            ],
            [
                'branch_id' => 2,
                'name' => 'Sample name 4',
                'unified_national_number' => 'Sample unified_national_number 4',
                'tax_number' => 'Sample tax_number 4',
                'commercial_record_value' => 427,
                'capital' => 449,
                'start_date' => '2016-10-08',
                'annual_confirmation_date' => '2024-10-08',
                'financial_year_start' => '2011-10-08',
                'financial_year_end' => '2009-10-08',
            ],
            [
                'branch_id' => 1,
                'name' => 'Sample name 5',
                'unified_national_number' => 'Sample unified_national_number 5',
                'tax_number' => 'Sample tax_number 5',
                'commercial_record_value' => 619,
                'capital' => 658,
                'start_date' => '2019-10-08',
                'annual_confirmation_date' => '2020-10-08',
                'financial_year_start' => '2012-10-08',
                'financial_year_end' => '2012-10-08',
            ],
        ];

        foreach ($digital_facilities as $data) {
            DigitalFacility::firstOrCreate($data);
        }
    }
}
