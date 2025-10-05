<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyHeadquarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headquarters = [
            ['ar' => 'المقر الرئيسي الرياض', 'en' => 'Riyadh Headquarters'],
            ['ar' => 'المقر الرئيسي جدة', 'en' => 'Jeddah Headquarters'],
            ['ar' => 'المقر الرئيسي الدمام', 'en' => 'Dammam Headquarters'],
        ];

        foreach ($headquarters as $hq) {
            DB::table('company_headquarters')->insert([
                'headquarter_name' => json_encode($hq),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
