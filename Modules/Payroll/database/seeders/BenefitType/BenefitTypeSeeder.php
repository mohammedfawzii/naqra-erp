<?php

namespace Modules\Payroll\Database\Seeders\BenefitType;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\BenefitType;

class BenefitTypeSeeder extends Seeder
{
    public function run(): void
    {
        $benefit_types = [
            [
                'type' => [
                    'en' => 'Health Insurance',
                    'ar' => 'تأمين صحي'
                ],
            ],
            [
                'type' => [
                    'en' => 'Transport Allowance',
                    'ar' => 'بدل مواصلات'
                ],
            ],
            [
                'type' => [
                    'en' => 'Housing Allowance',
                    'ar' => 'بدل سكن'
                ],
            ],
            [
                'type' => [
                    'en' => 'Performance Bonus',
                    'ar' => 'مكافأة أداء'
                ],
            ],
            [
                'type' => [
                    'en' => 'Paid Vacation',
                    'ar' => 'إجازة مدفوعة'
                ],
            ],
            [
                'type' => [
                    'en' => 'Overtime Pay',
                    'ar' => 'أجر ساعات إضافية'
                ],
            ],
            [
                'type' => [
                    'en' => 'Meal Allowance',
                    'ar' => 'بدل وجبات'
                ],
            ],
            [
                'type' => [
                    'en' => 'Life Insurance',
                    'ar' => 'تأمين على الحياة'
                ],
            ],
            [
                'type' => [
                    'en' => 'Retirement Contribution',
                    'ar' => 'مساهمة للتقاعد'
                ],
            ],
        ];

        foreach ($benefit_types as $data) {
            BenefitType::firstOrCreate($data);
        }
    }
}
