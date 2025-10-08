<?php

namespace Modules\Employee\Database\Seeders\EmployeeAccount;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeAccount;

class EmployeeAccountSeeder extends Seeder
{
    public function run(): void
    {
        $employee_accounts = [
            [
                'email' => 'Sample email 1',
                'password' => 'Sample password 1',
                'approved' => 'yes',
                'send_login_email' => 1,
            ],
            [
                'email' => 'Sample email 2',
                'password' => 'Sample password 2',
                'approved' => 'yes',
                'send_login_email' => 1,
            ],
            [
                'email' => 'Sample email 3',
                'password' => 'Sample password 3',
                'approved' => 'yes',
                'send_login_email' => 1,
            ],
            [
                'email' => 'Sample email 4',
                'password' => 'Sample password 4',
                'approved' => 'yes',
                'send_login_email' => 1,
            ],
            [
                'email' => 'Sample email 5',
                'password' => 'Sample password 5',
                'approved' => 'yes',
                'send_login_email' => 1,
            ],
        ];

        foreach ($employee_accounts as $data) {
            EmployeeAccount::firstOrCreate($data);
        }
    }
}
