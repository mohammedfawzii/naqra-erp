<?php

namespace Modules\Payroll\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payroll\Models\InfoPayroll;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'infoable_type' => 'ChatbotforPayroll',
                'title' => ['en' => 'Chatbotforpayroll', 'ar' => 'chatbotforpayroll'],
                'desc'  => ['en' => 'Description for Chatbotforpayroll', 'ar' => 'وصف chatbot للكشوف المرتبات'],
            ],            [
                'infoable_type' => 'MultiCountryPayroll',
                'title' => ['en' => 'Multicountrypayroll', 'ar' => 'الرواتب متعددة البلدان'],
                'desc'  => ['en' => 'Description for Multicountrypayroll', 'ar' => 'وصف الرواتب متعددة البلدان'],
            ],            [
                'infoable_type' => 'EndofServiceCalculations',
                'title' => ['en' => 'Endofservicecalculations', 'ar' => 'endofservicalcalculculculcities'],
                'desc'  => ['en' => 'Description for Endofservicecalculations', 'ar' => 'الوصف للعلاج الداخلي'],
            ],            [
                'infoable_type' => 'LoanDeductions',
                'title' => ['en' => 'Loandeductions', 'ar' => 'loandeductions'],
                'desc'  => ['en' => 'Description for Loandeductions', 'ar' => 'الوصف ل loodeductions'],
            ],            [
                'infoable_type' => 'PaidLeaveManagement',
                'title' => ['en' => 'Paidleavemanagement', 'ar' => 'إدارة الإجازة المدفوعة'],
                'desc'  => ['en' => 'Description for Paidleavemanagement', 'ar' => 'وصف لإدارة الإجازة المدفوعة الأجر'],
            ],            [
                'infoable_type' => 'PayrollAnalytics',
                'title' => ['en' => 'Payrollanalytics', 'ar' => 'تحلل الرواتب'],
                'desc'  => ['en' => 'Description for Payrollanalytics', 'ar' => 'وصف لتحليلات كشوف المرتبات'],
            ],            [
                'infoable_type' => 'PayrollProfile',
                'title' => ['en' => 'Payrollprofile', 'ar' => 'ملف تعريف الرواتب'],
                'desc'  => ['en' => 'Description for Payrollprofile', 'ar' => 'وصف ملف تعريف كشوف المرتبات'],
            ],            [
                'infoable_type' => 'BenefitEmployee',
                'title' => ['en' => 'Benefitemployee', 'ar' => 'المنفعة'],
                'desc'  => ['en' => 'Description for Benefitemployee', 'ar' => 'وصف للمنفصات'],
            ],            [
                'infoable_type' => 'BenefitType',
                'title' => ['en' => 'Benefittype', 'ar' => 'الفائدة'],
                'desc'  => ['en' => 'Description for Benefittype', 'ar' => 'وصف لـ BenefitType'],
            ],            [
                'infoable_type' => 'AttendanceManagement',
                'title' => ['en' => 'Attendancemanagement', 'ar' => 'إدارة الحضور'],
                'desc'  => ['en' => 'Description for Attendancemanagement', 'ar' => 'وصف لإدارة الحضور'],
            ],            [
                'infoable_type' => 'EmployeePaymentManagement',
                'title' => ['en' => 'Employeepaymentmanagement', 'ar' => 'إدارة دفع الموظفين'],
                'desc'  => ['en' => 'Description for Employeepaymentmanagement', 'ar' => 'وصف لإدارة دفع الموظفين'],
            ],            [
                'infoable_type' => 'PayrollManagement',
                'title' => ['en' => 'Payrollmanagement', 'ar' => 'إدارة الرواتب'],
                'desc'  => ['en' => 'Description for Payrollmanagement', 'ar' => 'وصف لإدارة كشوف المرتبات'],
            ],            [
                'infoable_type' => 'PayrollReport',
                'title' => ['en' => 'Payrollreport', 'ar' => 'payrollreport'],
                'desc'  => ['en' => 'Description for Payrollreport', 'ar' => 'الوصف لعملية الرواتب'],
            ],            [
                'infoable_type' => 'TaxDeduction',
                'title' => ['en' => 'Taxdeduction', 'ar' => 'خصم ضريبي'],
                'desc'  => ['en' => 'Description for Taxdeduction', 'ar' => 'وصف لخصم الضرائب'],
            ],            [
                'infoable_type' => 'Payroll',
                'title' => ['en' => 'Payroll', 'ar' => 'كشوف المرتبات'],
                'desc'  => ['en' => 'Description for Payroll', 'ar' => 'وصف كشوف المرتبات'],
            ],
            [
                'infoable_type' => 'Incentive',
                'title' => ['en' => 'Incentive', 'ar' => 'حافز'],
                'desc'  => ['en' => 'Description for Incentive', 'ar' => 'وصف للحوافز'],
            ],



        ];

        foreach ($records as $record) {
            InfoPayroll::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
