<?php

namespace Modules\Employee\Database\Seeders\EmployeeOtherEntitlement;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeOtherEntitlement;

class EmployeeOtherEntitlementSeeder extends Seeder
{
    public function run(): void
    {
        $employee_other_entitlements = [
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 1',
                'amount' => 56.98,
                'note' => 'Sample note 1',
            ],
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 2',
                'amount' => 66.27,
                'note' => 'Sample note 2',
            ],
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 3',
                'amount' => 27.90,
                'note' => 'Sample note 3',
            ],
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 4',
                'amount' => 4.21,
                'note' => 'Sample note 4',
            ],
            [
                'employee_id' => 1,
                'entitlement_name' => 'Sample entitlement_name 5',
                'amount' => 63.76,
                'note' => 'Sample note 5',
            ],
        ];

        foreach ($employee_other_entitlements as $data) {
            EmployeeOtherEntitlement::firstOrCreate($data);
        }
    }
}
