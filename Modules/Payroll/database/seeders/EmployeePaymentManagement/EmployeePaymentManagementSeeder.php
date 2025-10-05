<?php

namespace Modules\Payroll\Database\Seeders\EmployeePaymentManagement;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\EmployeePaymentManagement;

class EmployeePaymentManagementSeeder extends Seeder
{
    public function run(): void
    {
        $employee_payment_management = [
            [
                'employee_id' => 2,
                'bank_id' => 2,
                'payment_method_id' => 2,
                'bank_account_number' => 'Sample bank_account_number 1',
                'iban' => 'Sample iban 1',
                'payroll_date' => '2011-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 3,
                'bank_id' => 1,
                'payment_method_id' => 1,
                'bank_account_number' => 'Sample bank_account_number 2',
                'iban' => 'Sample iban 2',
                'payroll_date' => '2024-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'bank_id' => 3,
                'payment_method_id' => 1,
                'bank_account_number' => 'Sample bank_account_number 3',
                'iban' => 'Sample iban 3',
                'payroll_date' => '2023-09-22',
                'payroll_attachments_id' => 2,
            ],
            [
                'employee_id' => 2,
                'bank_id' => 2,
                'payment_method_id' => 2,
                'bank_account_number' => 'Sample bank_account_number 4',
                'iban' => 'Sample iban 4',
                'payroll_date' => '2018-09-22',
                'payroll_attachments_id' => 3,
            ],
            [
                'employee_id' => 1,
                'bank_id' => 1,
                'payment_method_id' => 2,
                'bank_account_number' => 'Sample bank_account_number 5',
                'iban' => 'Sample iban 5',
                'payroll_date' => '2016-09-22',
                'payroll_attachments_id' => 3,
            ],
        ];

        foreach ($employee_payment_management as $data) {
            EmployeePaymentManagement::firstOrCreate($data);
        }
    }
}
