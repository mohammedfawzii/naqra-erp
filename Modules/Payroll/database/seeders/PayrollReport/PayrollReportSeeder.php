<?php

namespace Modules\Payroll\Database\Seeders\PayrollReport;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollReport;

class PayrollReportSeeder extends Seeder
{
    public function run(): void
    {
        $payroll_reports = [
            [
                'from_date' => '2018-09-22',
                'to_date' => '2006-09-22',
                'total_incentives' => 38.27,
                'total_deductions' => 36.17,
                'total_salaries' => 65.90,
                'payroll_attachments_id' => 1,
            ],
            [
                'from_date' => '2019-09-22',
                'to_date' => '2005-09-22',
                'total_incentives' => 41.78,
                'total_deductions' => 77.68,
                'total_salaries' => 25.09,
                'payroll_attachments_id' => 2,
            ],
            [
                'from_date' => '2014-09-22',
                'to_date' => '2014-09-22',
                'total_incentives' => 66.42,
                'total_deductions' => 59.61,
                'total_salaries' => 78.47,
                'payroll_attachments_id' => 3,
            ],
            [
                'from_date' => '2023-09-22',
                'to_date' => '2023-09-22',
                'total_incentives' => 43.91,
                'total_deductions' => 42.10,
                'total_salaries' => 17.20,
                'payroll_attachments_id' => 1,
            ],
            [
                'from_date' => '2020-09-22',
                'to_date' => '2015-09-22',
                'total_incentives' => 89.48,
                'total_deductions' => 72.67,
                'total_salaries' => 47.38,
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($payroll_reports as $data) {
            PayrollReport::firstOrCreate($data);
        }
    }
}
