<?php

namespace Modules\Payroll\Database\Seeders\PayrollManagement;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\PayrollManagement;

class PayrollManagementSeeder extends Seeder
{
    public function run(): void
    {
        $payroll_management = [
            [
                'employee_id' => 1,
                'payroll_number' => 'Sample payroll_number 1',
                'status' => 'pending',
                'payroll_date' => '2012-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 3,
                'payroll_number' => 'Sample payroll_number 2',
                'status' => 'pending',
                'payroll_date' => '2009-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'payroll_number' => 'Sample payroll_number 3',
                'status' => 'pending',
                'payroll_date' => '2020-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 2,
                'payroll_number' => 'Sample payroll_number 4',
                'status' => 'pending',
                'payroll_date' => '2013-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'payroll_number' => 'Sample payroll_number 5',
                'status' => 'pending',
                'payroll_date' => '2007-09-22',
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($payroll_management as $data) {
            PayrollManagement::firstOrCreate($data);
        }
    }
}
