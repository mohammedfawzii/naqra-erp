<?php

namespace Modules\Payroll\Database\Seeders\Incentive;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\Incentive;

class IncentiveSeeder extends Seeder
{
    public function run(): void
    {
        $incentives = [
            [
                'employee_id' => 1,
                'incentive_types_id' =>2,
                'amount' => 66.19,
                'issue_date' => '1975-09-21',
                'incentive_status_id' => 1,

                'performance_rating' => 694,
                'payroll_attachments_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 1,
                'incentive_types_id' => 1,
                'amount' => 52.03,
                'issue_date' => '2009-09-21',
                'incentive_status_id' => 1,

                'performance_rating' => 974,
                'payroll_attachments_id' => 123456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 1,
                'incentive_types_id' => 2,
                'amount' => 48.87,
                'issue_date' => '1976-09-21',
                'incentive_status_id' => 2,

                'performance_rating' => 285,
                'payroll_attachments_id' => 123456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 1,
                'incentive_types_id' =>2,
                'amount' => 34.57,
                'issue_date' => '1978-09-21',
                'incentive_status_id' => 2,

                'performance_rating' => 20,
                'payroll_attachments_id' => 123456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 1,
                'incentive_types_id' =>3,
                'amount' => 80.51,
                'issue_date' => '1987-09-21',
                'incentive_status_id' => 2,

                'performance_rating' => 212,
                'payroll_attachments_id' => 123456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

           foreach ($incentives as $incentive) {
            Incentive::firstOrCreate($incentive);
        }
     }
}
