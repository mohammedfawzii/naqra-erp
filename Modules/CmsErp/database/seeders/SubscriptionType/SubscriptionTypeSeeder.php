<?php

namespace Modules\CmsErp\Database\Seeders\SubscriptionType;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\SubscriptionType;

class SubscriptionTypeSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionType::firstOrCreate([
                'type' => json_encode(['sample' => 'Sample type 1']),
        ]);

        SubscriptionType::firstOrCreate([
                'type' => json_encode(['sample' => 'Sample type 2']),
        ]);

        SubscriptionType::firstOrCreate([
                'type' => json_encode(['sample' => 'Sample type 3']),
        ]);

        SubscriptionType::firstOrCreate([
                'type' => json_encode(['sample' => 'Sample type 4']),
        ]);

        SubscriptionType::firstOrCreate([
                'type' => json_encode(['sample' => 'Sample type 5']),
        ]);

    }
}
