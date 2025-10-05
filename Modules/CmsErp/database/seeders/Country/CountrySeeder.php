<?php

namespace Modules\CmsErp\Database\Seeders\Country;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
          if (Country::exists()) {
            $this->command->info('⏭️ ActivitySpecifics already seeded, skipping...');
            return;
        }
        $countries = [
            [
                'name' => json_encode([
                    'ar' => 'مصر',
                    'en' => 'Egypt',
                ], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'الامارات',
                    'en' => 'UAE',
                ], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Country::insert($countries);
    }
}
