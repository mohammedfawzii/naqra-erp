<?php

namespace Modules\Facilities\Database\Seeders\Facilities;

use Illuminate\Database\Seeder;
use Modules\Facilities\Models\Facilities;

class FacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        Facilities::firstOrCreate([
                'img' => 'Sample img 1',
                'unified_national_number' => 'Sample unified_national_number 1',
                'company_name_ar' => 'Sample company_name_ar 1',
                'company_name_en' => 'Sample company_name_en 1',
                'company_type_id' => '1',
                'company_size_id' => '1',
                'company_headquarters_id' => '2',
                'company_activities_id' => '1',
        ]);

        Facilities::firstOrCreate([
                'img' => 'Sample img 2',
                'unified_national_number' => 'Sample unified_national_number 2',
                'company_name_ar' => 'Sample company_name_ar 2',
                'company_name_en' => 'Sample company_name_en 2',
                'company_type_id' => '2',
                'company_size_id' => '2',
                'company_headquarters_id' => '2',
                'company_activities_id' => '2',
        ]);

        Facilities::firstOrCreate([
                'img' => 'Sample img 3',
                'unified_national_number' => 'Sample unified_national_number 3',
                'company_name_ar' => 'Sample company_name_ar 3',
                'company_name_en' => 'Sample company_name_en 3',
                'company_type_id' => '3',
                'company_size_id' => '3',
                'company_headquarters_id' => '2',
                'company_activities_id' => '3',
        ]);

        Facilities::firstOrCreate([
                'img' => 'Sample img 4',
                'unified_national_number' => 'Sample unified_national_number 4',
                'company_name_ar' => 'Sample company_name_ar 4',
                'company_name_en' => 'Sample company_name_en 4',
                'company_type_id' => '4',
                'company_size_id' => '4',
                'company_headquarters_id' => '3',
                'company_activities_id' => '4',
        ]);

        Facilities::firstOrCreate([
                'img' => 'Sample img 5',
                'unified_national_number' => 'Sample unified_national_number 5',
                'company_name_ar' => 'Sample company_name_ar 5',
                'company_name_en' => 'Sample company_name_en 5',
                'company_type_id' => '5',
                'company_size_id' => '5',
                'company_headquarters_id' => '2',
                'company_activities_id' => '5',
        ]);

    }
}
