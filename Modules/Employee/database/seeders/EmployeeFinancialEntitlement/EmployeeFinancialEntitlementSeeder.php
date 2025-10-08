<?php

namespace Modules\Employee\Database\Seeders\EmployeeFinancialEntitlement;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeFinancialEntitlement;

class EmployeeFinancialEntitlementSeeder extends Seeder
{
    public function run(): void
    {
        $employee_financial_entitlements = [
            [
                'employee_id' => 3,
                'basic_salary' => 36.49,
                'salary_type_id' => 2,
                'currency_id' => 3,
                'iban' => 'Sample iban 1',
                'cost_center' => 'Sample cost_center 1',
                'salary_payment_method' => 'Sample salary_payment_method 1',
                'bank_id' => 3,
            ],
            [
                'employee_id' => 3,
                'basic_salary' => 17.95,
                'salary_type_id' => 2,
                'currency_id' => 3,
                'iban' => 'Sample iban 2',
                'cost_center' => 'Sample cost_center 2',
                'salary_payment_method' => 'Sample salary_payment_method 2',
                'bank_id' => 1,
            ],
            [
                'employee_id' => 3,
                'basic_salary' => 24.00,
                'salary_type_id' => 1,
                'currency_id' => 2,
                'iban' => 'Sample iban 3',
                'cost_center' => 'Sample cost_center 3',
                'salary_payment_method' => 'Sample salary_payment_method 3',
                'bank_id' => 3,
            ],
            [
                'employee_id' => 2,
                'basic_salary' => 40.15,
                'salary_type_id' => 2,
                'currency_id' => 3,
                'iban' => 'Sample iban 4',
                'cost_center' => 'Sample cost_center 4',
                'salary_payment_method' => 'Sample salary_payment_method 4',
                'bank_id' => 1,
            ],
            [
                'employee_id' => 1,
                'basic_salary' => 16.80,
                'salary_type_id' => 2,
                'currency_id' => 1,
                'iban' => 'Sample iban 5',
                'cost_center' => 'Sample cost_center 5',
                'salary_payment_method' => 'Sample salary_payment_method 5',
                'bank_id' => 1,
            ],
        ];

        foreach ($employee_financial_entitlements as $data) {
            EmployeeFinancialEntitlement::firstOrCreate($data);
        }
    }
}
