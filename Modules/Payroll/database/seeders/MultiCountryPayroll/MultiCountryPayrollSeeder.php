<?php

namespace Modules\Payroll\Database\Seeders\MultiCountryPayroll;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\MultiCountryPayroll;

class MultiCountryPayrollSeeder extends Seeder
{
    public function run(): void
    {
        $multi_country_payrolls = [
            [
                'employee_id' => 3,
                'country_id' => 3,
                'basic_salary' => 97.63,
                'currency_id' => 3,
                'compliance_status' => 'pending',
            ],
            [
                'employee_id' => 2,
                'country_id' => 1,
                'basic_salary' => 86.72,
                'currency_id' => 1,
                'compliance_status' => 'pending',
            ],
            [
                'employee_id' => 2,
                'country_id' => 1,
                'basic_salary' => 7.43,
                'currency_id' => 1,
                'compliance_status' => 'pending',
            ],
            [
                'employee_id' => 2,
                'country_id' => 3,
                'basic_salary' => 15.09,
                'currency_id' => 3,
                'compliance_status' => 'pending',
            ],
            [
                'employee_id' => 1,
                'country_id' => 1,
                'basic_salary' => 95.08,
                'currency_id' => 1,
                'compliance_status' => 'pending',
            ],
        ];

        foreach ($multi_country_payrolls as $data) {
            MultiCountryPayroll::firstOrCreate($data);
        }
    }
}
