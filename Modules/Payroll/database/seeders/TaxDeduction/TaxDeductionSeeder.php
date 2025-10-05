<?php

namespace Modules\Payroll\Database\Seeders\TaxDeduction;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\TaxDeduction;

class TaxDeductionSeeder extends Seeder
{
    public function run(): void
    {
        $tax_deductions = [
            [
                'employee_id' => 2,
                'tax_deduction_types_id' => 3,
                'amount' => 42.63,
                'deduction_date' => '2014-09-22',
                'tax_deduction_statuses_id' => 2,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'tax_deduction_types_id' => 3,
                'amount' => 83.76,
                'deduction_date' => '2019-09-22',
                'tax_deduction_statuses_id' => 1,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'tax_deduction_types_id' => 1,
                'amount' => 16.56,
                'deduction_date' => '2021-09-22',
                'tax_deduction_statuses_id' => 2,
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'tax_deduction_types_id' => 2,
                'amount' => 20.03,
                'deduction_date' => '2007-09-22',
                'tax_deduction_statuses_id' => 1,
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'tax_deduction_types_id' => 2,
                'amount' => 53.07,
                'deduction_date' => '2010-09-22',
                'tax_deduction_statuses_id' => 3,
                'payroll_attachments_id' => 2,
            ],
        ];

        foreach ($tax_deductions as $data) {
            TaxDeduction::firstOrCreate($data);
        }
    }
}
