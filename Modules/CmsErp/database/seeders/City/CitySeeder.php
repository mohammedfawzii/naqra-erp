<?php

namespace Modules\CmsErp\Database\Seeders\City;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
          if (City::exists()) {
            $this->command->info('⏭️ ActivitySpecifics already seeded, skipping...');
            return;
        }
        $cities = [
            [
                'name' => json_encode([
                    'ar' => 'القاهرة',
                    'en' => 'Cairo',
                ], JSON_UNESCAPED_UNICODE),
                'country_id' => 1, // Egypt
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'الاسكندرية',
                    'en' => 'Alexandria',
                ], JSON_UNESCAPED_UNICODE),
                'country_id' => 1, // Egypt
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'دبي',
                    'en' => 'Dubai',
                ], JSON_UNESCAPED_UNICODE),
                'country_id' => 2, // UAE
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'ابو ظبي',
                    'en' => 'Abu Dhabi',
                ], JSON_UNESCAPED_UNICODE),
                'country_id' => 2, // UAE
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        City::insert($cities);
        
    }
}
