<?php

namespace Modules\CmsErp\Database\Seeders\Setting;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Department;
use Modules\CmsErp\Models\NoticePeriod;
use Modules\CmsErp\Models\TrialPeriod;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => ['en' => 'Human Resources', 'ar' => 'الموارد البشرية']],
            ['name' => ['en' => 'Finance', 'ar' => 'المالية']],
            ['name' => ['en' => 'IT Department', 'ar' => 'قسم تكنولوجيا المعلومات']],
        ];

        $noticePeriods = [
            ['period_name' => ['en' => 'One Month', 'ar' => 'شهر واحد']],
            ['period_name' => ['en' => 'Two Months', 'ar' => 'شهرين']],
            ['period_name' => ['en' => 'Three Months', 'ar' => 'ثلاثة أشهر']],
        ];

        $trialPeriods = [
            ['period_long' => ['en' => 'One Month', 'ar' => 'شهر واحد']],
            ['period_long' => ['en' => 'Two Months', 'ar' => 'شهرين']],
            ['period_long' => ['en' => 'Three Months', 'ar' => 'ثلاثة أشهر']],
        ];

        foreach ($trialPeriods as $period) {
            TrialPeriod::create($period);
        }

        foreach ($noticePeriods as $period) {
            NoticePeriod::create($period);
        }

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
