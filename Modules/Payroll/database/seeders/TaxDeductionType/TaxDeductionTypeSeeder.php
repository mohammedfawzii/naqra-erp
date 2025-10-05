<?php

namespace Modules\Payroll\Database\Seeders\TaxDeductionType;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\TaxDeductionType;

class TaxDeductionTypeSeeder extends Seeder
{
    public function run(): void
    {
        $tax_deduction_types = [
            [
                'type' => [
                    'en' => 'Income Tax',
                    'ar' => 'ضريبة الدخل',
                ],
            ],
            [
                'type' => [
                    'en' => 'Social Insurance',
                    'ar' => 'التأمينات الاجتماعية',
                ],
            ],
            [
                'type' => [
                    'en' => 'Health Insurance',
                    'ar' => 'التأمين الصحي',
                ],
            ],
            [
                'type' => [
                    'en' => 'Pension Contribution',
                    'ar' => 'مساهمة المعاشات',
                ],
            ],
            [
                'type' => [
                    'en' => 'Other Deductions',
                    'ar' => 'خصومات أخرى',
                ],
            ],
        ];

        foreach ($tax_deduction_types as $data) {
            TaxDeductionType::firstOrCreate($data);
        }
    }
}
