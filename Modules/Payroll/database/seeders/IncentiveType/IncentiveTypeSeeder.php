<?php

namespace Modules\Payroll\Database\Seeders\IncentiveType;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\IncentiveType;

class IncentiveTypeSeeder extends Seeder
{
    public function run(): void
    {
  $incentive_types = [
    ['type' => ['ar' => 'عينة 1', 'en' => 'Sample 1']],
    ['type' => ['ar' => 'عينة 2', 'en' => 'Sample 2']],
    ['type' => ['ar' => 'عينة 3', 'en' => 'Sample 3']],
];

foreach ($incentive_types as $data) {
    IncentiveType::firstOrCreate($data);
}


    }
}
