<?php

namespace Modules\CmsErp\Database\Seeders\BloodType;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\BloodType;

class BloodTypeSeeder extends Seeder
{
    public function run(): void
    {
        BloodType::firstOrCreate([
                'blood_type' => json_encode(['sample' => 'Sample blood_type 1']),
        ]);

        BloodType::firstOrCreate([
                'blood_type' => json_encode(['sample' => 'Sample blood_type 2']),
        ]);

        BloodType::firstOrCreate([
                'blood_type' => json_encode(['sample' => 'Sample blood_type 3']),
        ]);

        BloodType::firstOrCreate([
                'blood_type' => json_encode(['sample' => 'Sample blood_type 4']),
        ]);

        BloodType::firstOrCreate([
                'blood_type' => json_encode(['sample' => 'Sample blood_type 5']),
        ]);

    }
}
