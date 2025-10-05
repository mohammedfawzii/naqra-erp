<?php

namespace Modules\Payroll\Database\Seeders\ChatbotforPayroll;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\ChatbotforPayroll;

class ChatbotforPayrollSeeder extends Seeder
{
    public function run(): void
    {
        $chatbotfor_payrolls = [
            [
                'employee_id' => 1,
                'query_type' => 'salary',
                'date' => '2025-09-01',
                'query_date' => '2025-08-31',
                'query_status' => 'pending',
            ],
            [
                'employee_id' => 2,
                'query_type' => 'benefit',
                'date' => '2025-09-02',
                'query_date' => '2025-08-30',
                'query_status' => 'in_progress',
            ],
            [
                'employee_id' => 3,
                'query_type' => 'tax',
                'date' => '2025-09-03',
                'query_date' => '2025-08-29',
                'query_status' => 'resolved',
            ],
            [
                'employee_id' => 1,
                'query_type' => 'leave',
                'date' => '2025-09-04',
                'query_date' => '2025-09-10',
                'query_status' => 'closed',
            ],
            [
                'employee_id' => 2,
                'query_type' => 'other',
                'date' => '2025-09-05',
                'query_date' => '2025-09-01',
                'query_status' => 'pending',
            ],
        ];

        foreach ($chatbotfor_payrolls as $data) {
            ChatbotforPayroll::firstOrCreate([
                'employee_id' => $data['employee_id'],
                'query_type' => $data['query_type'],
                'date' => $data['date'],
                'query_date' => $data['query_date'],
                'query_status' => $data['query_status'],
            ]);
        }
    }
}
