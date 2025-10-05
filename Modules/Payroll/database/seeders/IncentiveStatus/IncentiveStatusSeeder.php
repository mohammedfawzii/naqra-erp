<?php

namespace Modules\Payroll\Database\Seeders\IncentiveStatus;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\IncentiveStatus;

class IncentiveStatusSeeder extends Seeder
{
     public function run(): void
    {
        $incentive_statuses = [
            ['status' => ['en' => 'Pending', 'ar' => 'قيد الانتظار']],
            ['status' => ['en' => 'Approved', 'ar' => 'تمت الموافقة']],
            ['status' => ['en' => 'Rejected', 'ar' => 'مرفوض']],
            ['status' => ['en' => 'Processing', 'ar' => 'جاري التنفيذ']],
            ['status' => ['en' => 'Completed', 'ar' => 'مكتمل']],
        ];

        foreach ($incentive_statuses as $data) {
            IncentiveStatus::firstOrCreate($data);
        }
    }
}
