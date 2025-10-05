<?php

namespace Modules\Payroll\Database\Seeders\LoanType;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\LoanType;

class LoanTypeSeeder extends Seeder
{
    public function run(): void
    {
        $loan_types = [
            [
                'type' => [
                    'en' => 'Personal Loan',
                    'ar' => 'قرض شخصي'
                ],
            ],
            [
                'type' => [
                    'en' => 'Housing Loan',
                    'ar' => 'قرض سكني'
                ],
            ],
            [
                'type' => [
                    'en' => 'Car Loan',
                    'ar' => 'قرض سيارة'
                ],
            ],
            [
                'type' => [
                    'en' => 'Education Loan',
                    'ar' => 'قرض تعليمي'
                ],
            ],
            [
                'type' => [
                    'en' => 'Emergency Loan',
                    'ar' => 'قرض طارئ'
                ],
            ],
        ];

        foreach ($loan_types as $data) {
            LoanType::firstOrCreate(['type' => $data['type']]);
        }
    }
}
