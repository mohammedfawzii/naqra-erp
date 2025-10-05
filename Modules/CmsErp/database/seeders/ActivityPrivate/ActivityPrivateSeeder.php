<?php

namespace Modules\CmsErp\Database\Seeders\ActivityPrivate;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\ActivityPrivate;

class ActivityPrivateSeeder extends Seeder
{
    public function run(): void
    {
        // لو فيه بيانات بالفعل يعمل سكيب
        if (ActivityPrivate::exists()) {
            $this->command->info('⏭️ ActivityPrivates already seeded, skipping...');
            return;
        }

        $activities = [
            [
                'activity_general_id' => 1,
                'name' => ['ar' => 'اجتماع داخلي خاص', 'en' => 'Private Internal Meeting'],
            ],
            [
                'activity_general_id' => 1,
                'name' => ['ar' => 'اجتماع مع عميل خاص', 'en' => 'Private Client Meeting'],
            ],
            [
                'activity_general_id' => 2,
                'name' => ['ar' => 'مكالمة هاتفية خاصة', 'en' => 'Private Phone Call'],
            ],
            [
                'activity_general_id' => 3,
                'name' => ['ar' => 'مهمة متابعة خاصة', 'en' => 'Private Follow-up Task'],
            ],
        ];

        foreach ($activities as $activity) {
            ActivityPrivate::create([
                'activity_general_id' => $activity['activity_general_id'],
                'name'       => json_encode($activity['name'], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ ActivityPrivates seeded successfully!');
    }
}
