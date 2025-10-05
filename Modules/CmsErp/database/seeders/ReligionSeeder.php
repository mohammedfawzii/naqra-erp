<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    DB::table('religions')->insert([
        ['name' => json_encode(['ar' => 'الإسلام', 'en' => 'Islam']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'المسيحية', 'en' => 'Christianity']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'اليهودية', 'en' => 'Judaism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الهندوسية', 'en' => 'Hinduism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'البوذية', 'en' => 'Buddhism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'السيخية', 'en' => 'Sikhism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الطاوية', 'en' => 'Taoism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الشنتوية', 'en' => 'Shinto']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الزرادشتية', 'en' => 'Zoroastrianism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'البهائية', 'en' => 'Bahá\'í Faith']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الكونفوشيوسية', 'en' => 'Confucianism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الجاينية', 'en' => 'Jainism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الوثنية', 'en' => 'Paganism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الإلحاد', 'en' => 'Atheism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'اللا دينية', 'en' => 'Agnosticism']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الديانات التقليدية الأفريقية', 'en' => 'African Traditional Religions']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الديانات الأمريكية الأصلية', 'en' => 'Native American Religions']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الديانات الأسترالية الأصلية', 'en' => 'Australian Aboriginal Religions']), 'created_at' => now(), 'updated_at' => now()],
        ['name' => json_encode(['ar' => 'الديانات الجديدة', 'en' => 'New Age Religions']), 'created_at' => now(), 'updated_at' => now()],
    ]);
}

}
