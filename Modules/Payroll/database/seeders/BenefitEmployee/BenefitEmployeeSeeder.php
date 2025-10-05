<?php

namespace Modules\Payroll\Database\Seeders\BenefitEmployee;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\BenefitEmployee;

class BenefitEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $benefit_employees = [
            [
                'employee_id' => 3,
                'benefit_types_id' => 2,
                'amount' => 22.16,
                'start_date' => '2021-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 3,
                'benefit_types_id' => 1,
                'amount' => 91.80,
                'start_date' => '2006-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'benefit_types_id' => 1,
                'amount' => 99.96,
                'start_date' => '2018-09-22',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'benefit_types_id' => 1,
                'amount' => 71.18,
                'start_date' => '2013-09-22',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 3,
                'benefit_types_id' => 1,
                'amount' => 63.43,
                'start_date' => '2009-09-22',
                'payroll_attachments_id' => 2,
            ],
        ];

        foreach ($benefit_employees as $data) {
            BenefitEmployee::firstOrCreate($data);
        }
    }
}
