<?php

namespace Modules\Employee\Database\Seeders\EmployeeAllowance;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeAllowance;

class EmployeeAllowanceSeeder extends Seeder
{
    public function run(): void
    {
        $employee_allowances = [
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 1',
                'amount' => 24.20,
            ],
            [
                'employee_id' => 3,
                'entitlement_name' => 'Sample entitlement_name 2',
                'amount' => 7.39,
            ],
            [
                'employee_id' => 2,
                'entitlement_name' => 'Sample entitlement_name 3',
                'amount' => 11.27,
            ],
            [
                'employee_id' => 3,
                'entitlement_name' => 'Sample entitlement_name 4',
                'amount' => 63.42,
            ],
            [
                'employee_id' => 2,
                'entitlement_name' => 'Sample entitlement_name 5',
                'amount' => 26.35,
            ],
        ];

        foreach ($employee_allowances as $data) {
            EmployeeAllowance::firstOrCreate($data);
        }
    }
}
