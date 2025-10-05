<?php

namespace Modules\Payroll\Database\Seeders\Payroll;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\Payroll;

class PayrollSeeder extends Seeder
{
    public function run(): void
    {
        $payrolls = [
            [
                'employee_id' => 2,
                'basic_salary' => 81.25,
                'allowances' => 61.05,
                'overtime_hours' => 780,
                'overtime_amount' => 85.50,
                'deductions' => 56.03,
                'gross_salary' => 86.15,
                'net_salary' => 57.23,
                'payment_method_id' => 3,
                'currency_id' => 1,
                'payment_date' => '2013-09-22',
                'payroll_attachments_id' => 123456,
            ],
            [
                'employee_id' => 3,
                'basic_salary' => 34.99,
                'allowances' => 22.89,
                'overtime_hours' => 324,
                'overtime_amount' => 60.79,
                'deductions' => 20.44,
                'gross_salary' => 72.65,
                'net_salary' => 84.22,
                'payment_method_id' => 2,
                'currency_id' => 3,
                'payment_date' => '2016-09-22',
                'payroll_attachments_id' => 123456,
            ],
            [
                'employee_id' => 3,
                'basic_salary' => 28.47,
                'allowances' => 25.34,
                'overtime_hours' => 211,
                'overtime_amount' => 47.57,
                'deductions' => 8.45,
                'gross_salary' => 50.91,
                'net_salary' => 31.15,
                'payment_method_id' => 2,
                'currency_id' => 3,
                'payment_date' => '2019-09-22',
                'payroll_attachments_id' => 123456,
            ],
            [
                'employee_id' => 3,
                'basic_salary' => 67.94,
                'allowances' => 71.60,
                'overtime_hours' => 971,
                'overtime_amount' => 97.41,
                'deductions' => 72.23,
                'gross_salary' => 48.52,
                'net_salary' => 9.32,
                'payment_method_id' => 2,
                'currency_id' => 3,
                'payment_date' => '2023-09-22',
                'payroll_attachments_id' => 123456,
            ],
            [
                'employee_id' => 2,
                'basic_salary' => 25.42,
                'allowances' => 93.63,
                'overtime_hours' => 359,
                'overtime_amount' => 88.88,
                'deductions' => 43.80,
                'gross_salary' => 52.56,
                'net_salary' => 5.61,
                'payment_method_id' => 1,
                'currency_id' => 2,
                'payment_date' => '2013-09-22',
                'payroll_attachments_id' => 123456,
            ],
        ];

        foreach ($payrolls as $data) {
            Payroll::firstOrCreate($data);
        }
    }
}
