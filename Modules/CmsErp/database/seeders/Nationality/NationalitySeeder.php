<?php

namespace Modules\CmsErp\Database\Seeders\Nationality;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Nationality;

class NationalitySeeder extends Seeder
{
    public function run(): void
    {
        $nationalities = [
            [
                'name' => json_encode([
                    'ar' => 'مصري',
                    'en' => 'Egyptian',
                ], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'اماراتي',
                    'en' => 'Emirati',
                ], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Nationality::insert($nationalities);
    }
}
