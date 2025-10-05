<?php

namespace Modules\Payroll\Database\Seeders\TaxDeductionStatus;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\TaxDeductionStatus;

class TaxDeductionStatusSeeder extends Seeder
{
    public function run(): void
    {
        $tax_deduction_statuses = [
            [
                'status' => [
                    'en' => 'Pending',
                    'ar' => 'قيد الانتظار',
                ],
            ],
            [
                'status' => [
                    'en' => 'Calculated',
                    'ar' => 'تم الحساب',
                ],
            ],
            [
                'status' => [
                    'en' => 'Deducted',
                    'ar' => 'تم الخصم',
                ],
            ],
            [
                'status' => [
                    'en' => 'Exempted',
                    'ar' => 'معفى',
                ],
            ],
            [
                'status' => [
                    'en' => 'Disputed',
                    'ar' => 'محل نزاع',
                ],
            ],
        ];

        foreach ($tax_deduction_statuses as $data) {
            TaxDeductionStatus::firstOrCreate($data);
        }
    }
}
