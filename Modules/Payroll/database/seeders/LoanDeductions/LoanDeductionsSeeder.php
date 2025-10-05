<?php

namespace Modules\Payroll\Database\Seeders\LoanDeductions;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\LoanDeductions;

class LoanDeductionsSeeder extends Seeder
{
    public function run(): void
    {
        $loan_deductions = [
            [
                'employee_id' => 3,
                'loan_type_id' => 3,
                'deduction_percentage' => 92.55,
                'deduction_amount' => 44.02,
                'start_date' => '2007-09-23',
                'deduction_status' => 'pending',
                'end_date' => '2013-09-23',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'loan_type_id' => 1,
                'deduction_percentage' => 8.20,
                'deduction_amount' => 51.65,
                'start_date' => '2019-09-23',
                'deduction_status' => 'pending',
                'end_date' => '2012-09-23',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'loan_type_id' => 1,
                'deduction_percentage' => 42.57,
                'deduction_amount' => 2.46,
                'start_date' => '2016-09-23',
                'deduction_status' => 'pending',
                'end_date' => '2017-09-23',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 1,
                'loan_type_id' => 2,
                'deduction_percentage' => 87.98,
                'deduction_amount' => 39.60,
                'start_date' => '2016-09-23',
                'deduction_status' => 'pending',
                'end_date' => '2019-09-23',
                'payroll_attachments_id' => 1,
            ],
            [
                'employee_id' => 2,
                'loan_type_id' => 3,
                'deduction_percentage' => 28.55,
                'deduction_amount' => 18.68,
                'start_date' => '2005-09-23',
                'deduction_status' => 'pending',
                'end_date' => '2008-09-23',
                'payroll_attachments_id' => 2,
            ],
        ];

        foreach ($loan_deductions as $data) {
            LoanDeductions::firstOrCreate($data);
        }
    }
}
