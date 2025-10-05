<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            [
                'currency_type' => json_encode([
                    'en' => 'US Dollar',
                    'ar' => 'دولار أمريكي',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_type' => json_encode([
                    'en' => 'Euro',
                    'ar' => 'يورو',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_type' => json_encode([
                    'en' => 'Egyptian Pound',
                    'ar' => 'جنيه مصري',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_type' => json_encode([
                    'en' => 'Saudi Riyal',
                    'ar' => 'ريال سعودي',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
