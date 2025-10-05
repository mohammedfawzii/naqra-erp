<?php

namespace Modules\CmsErp\Database\Seeders\ActivitySpecific;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\ActivitySpecific;

class ActivitySpecificSeeder extends Seeder
{
    public function run(): void
    {
        if (ActivitySpecific::exists()) {
            $this->command->info('⏭️ ActivitySpecifics already seeded, skipping...');
            return;
        }

        $activities = [
            [
                'name' => json_encode([
                    'ar' => 'اجتماع داخلي - مشروع',
                    'en' => 'Internal Meeting - Project',
                ], JSON_UNESCAPED_UNICODE),
                'activity_private_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'اجتماع مع عميل - مشروع',
                    'en' => 'Client Meeting - Project',
                ], JSON_UNESCAPED_UNICODE),
                'activity_private_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'مكالمة هاتفية - مشروع',
                    'en' => 'Phone Call - Project',
                ], JSON_UNESCAPED_UNICODE),
                'activity_private_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'مهمة متابعة - مشروع',
                    'en' => 'Follow-up Task - Project',
                ], JSON_UNESCAPED_UNICODE),
                'activity_private_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ActivitySpecific::insert($activities);
    }
}
