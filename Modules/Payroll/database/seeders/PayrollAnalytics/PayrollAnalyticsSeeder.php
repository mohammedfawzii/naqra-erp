<?php

namespace Modules\Payroll\Database\Seeders\PayrollAnalytics;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollAnalytics;

class PayrollAnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        $payroll_analytics = [
            [
                'start_date' => '2011-09-22',
                'end_date' => '2018-09-22',
                'total_salary' => 1.39,
                'predicted_cost' => 16.76,
                'payroll_attachments_id' => 1,
            ],
            [
                'start_date' => '2016-09-22',
                'end_date' => '2011-09-22',
                'total_salary' => 66.88,
                'predicted_cost' => 79.67,
                'payroll_attachments_id' => 2,
            ],
            [
                'start_date' => '2014-09-22',
                'end_date' => '2014-09-22',
                'total_salary' => 23.55,
                'predicted_cost' => 27.49,
                'payroll_attachments_id' => 3,
            ],
            [
                'start_date' => '2011-09-22',
                'end_date' => '2011-09-22',
                'total_salary' => 47.69,
                'predicted_cost' => 62.28,
                'payroll_attachments_id' => 1,
            ],
            [
                'start_date' => '2021-09-22',
                'end_date' => '2009-09-22',
                'total_salary' => 43.19,
                'predicted_cost' => 62.45,
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($payroll_analytics as $data) {
            PayrollAnalytics::firstOrCreate($data);
        }
    }
}
