<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    $mainTypes = [
        ['ar' => 'دوام كامل', 'en' => 'Full-time'],
        ['ar' => 'دوام جزئي', 'en' => 'Part-time'],
        ['ar' => 'عقد', 'en' => 'Contract'],
        ['ar' => 'مؤقت', 'en' => 'Temporary'],
        ['ar' => 'عمل حر', 'en' => 'Freelance'],
    ];

    foreach ($mainTypes as $type) {
        DB::table('salary_types')->insert([
            'salary_type' => json_encode($type),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

}
