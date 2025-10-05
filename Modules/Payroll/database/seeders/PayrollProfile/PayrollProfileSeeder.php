<?php

namespace Modules\Payroll\Database\Seeders\PayrollProfile;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollProfile;

class PayrollProfileSeeder extends Seeder
{
    public function run(): void
    {
        $payroll_profiles = [
            [
                'employee_id' => 3,
                'payment_date' => '2010-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'payment_date' => '2010-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 3,
                'payment_date' => '2019-09-22',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'payment_date' => '2023-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'payment_date' => '2018-09-22',
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($payroll_profiles as $data) {
            PayrollProfile::firstOrCreate($data);
        }
    }
}
