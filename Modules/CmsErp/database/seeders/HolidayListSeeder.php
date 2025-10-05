<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HolidayListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $holidays = [
            ['en' => 'New Year\'s Day', 'ar' => 'رأس السنة الميلادية'],
            ['en' => 'Eid al-Fitr', 'ar' => 'عيد الفطر'],
            ['en' => 'Eid al-Adha', 'ar' => 'عيد الأضحى'],
            ['en' => 'Labor Day', 'ar' => 'عيد العمال'],
            ['en' => 'National Day', 'ar' => 'اليوم الوطني'],
        ];

        foreach ($holidays as $holiday) {
            DB::table('holidays_lists')->insert([
                'holiday_type' => json_encode($holiday, JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
