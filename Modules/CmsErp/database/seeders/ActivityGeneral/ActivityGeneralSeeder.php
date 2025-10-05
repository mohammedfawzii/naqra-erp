<?php

namespace Modules\CmsErp\Database\Seeders\ActivityGeneral;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\ActivityGeneral;

class ActivityGeneralSeeder extends Seeder
{
    public function run(): void
    {
        // لو فيه بيانات بالفعل يعمل سكيب
        if (ActivityGeneral::exists()) {
            $this->command->info('⏭️ ActivityGenerals already seeded, skipping...');
            return;
        }

        $activities = [
            [
                'name' => ['ar' => 'اجتماع داخلي', 'en' => 'Internal Meeting'],
            ],
            [
                'name' => ['ar' => 'اجتماع مع عميل', 'en' => 'Client Meeting'],
            ],
            [
                'name' => ['ar' => 'مكالمة هاتفية', 'en' => 'Phone Call'],
            ],
            [
                'name' => ['ar' => 'مهمة متابعة', 'en' => 'Follow-up Task'],
            ],
        ];

        foreach ($activities as $activity) {
            ActivityGeneral::create([
                'name'       => json_encode($activity['name'], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ ActivityGenerals seeded successfully!');
    }
}
