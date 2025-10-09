<?php

namespace Modules\CmsErp\Database\Seeders\SubscriptionType;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\SubscriptionType;

class SubscriptionTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['en' => 'Sample type 1', 'ar' => 'عينة النوع 1'],
            ['en' => 'Sample type 2', 'ar' => 'عينة النوع 2'],
            ['en' => 'Sample type 3', 'ar' => 'عينة النوع 3'],
            ['en' => 'Sample type 4', 'ar' => 'عينة النوع 4'],
            ['en' => 'Sample type 5', 'ar' => 'عينة النوع 5'],
        ];

        foreach ($types as $type) {
            SubscriptionType::firstOrCreate([
                'type' => json_encode($type),
            ]);
        }
    }
}
