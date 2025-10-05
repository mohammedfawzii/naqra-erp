<?php

namespace Modules\Payroll\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'ChatbotforPayroll' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['query_type', 'Query_Type', 'Query Type', 'نوع الاستعلام'],
            ['date', 'تاريخ', 'Date', 'تاريخ'],
            ['query_date', 'Query_Date', 'Query Date', 'تاريخ الاستعلام'],
            ['query_status', 'Query_Status', 'Query Status', 'حالة الاستعلام']
        ],

        'MultiCountryPayroll' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['country', 'دولة', 'Country', 'دولة'],
            ['basic_salary', 'basic_salary', 'Basic Salary', 'الراتب الأساسي'],
            ['currency', 'عملة', 'Currency', 'عملة'],
            ['compliance_status', 'الامتثال_ستاتوس', 'Compliance Status', 'حالة الامتثال']
        ],

        'EndofServiceCalculations' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['service_duration', 'service_duration', 'Service Duration', 'مدة الخدمة'],
            ['end_of_service_amount', 'end_of_service_amount', 'End Of Service Amount', 'مبلغ نهاية الخدمة'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['calculation_status', 'calculation_status', 'Calculation Status', 'حالة الحساب'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'LoanDeductions' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['loanType', 'Loantype', 'Loantype', 'Loantype'],
            ['deduction_percentage', 'protuction_percentage', 'Deduction Percentage', 'نسبة الخصم'],
            ['deduction_amount', 'reduction_amount', 'Deduction Amount', 'مبلغ الخصم'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['deduction_status', 'protuction_status', 'Deduction Status', 'حالة الخصم'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'PaidLeaveManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['holidaysLists', 'عطلات', 'Holidayslists', 'عطلات'],
            ['leave_balance', 'LEEAD_BALANCE', 'Leave Balance', 'اترك التوازن'],
            ['leave_date', 'LEEAD_DATE', 'Leave Date', 'ترك موعد'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'PayrollAnalytics' => [
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['total_salary', 'Total_salary', 'Total Salary', 'الراتب الكلي'],
            ['predicted_cost', 'المتوقع', 'Predicted Cost', 'التكلفة المتوقعة'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'PayrollProfile' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['payment_date', 'payment_date', 'Payment Date', 'تاريخ الدفع'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'BenefitEmployee' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['benefitTypes', 'الأنماط', 'Benefittypes', 'الأنماط'],
            ['amount', 'كمية', 'Amount', 'كمية'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],



        'AttendanceManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendance_date', 'الحضور', 'Attendance Date', 'تاريخ الحضور'],
            ['time_in', 'time_in', 'Time In', 'الوقت في'],
            ['time_out', 'نفذ الوقت', 'Time Out', 'نفذ الوقت'],
            ['work_hours', 'work_hours', 'Work Hours', 'ساعات العمل'],
            ['overtime_hours', 'العمل الإضافي', 'Overtime Hours', 'ساعات العمل الإضافي'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'EmployeePaymentManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['bank', 'بنك', 'Bank', 'بنك'],
            ['paymentMethod', 'PaymentMethod', 'Paymentmethod', 'PaymentMethod'],
            ['bank_account_number', 'bank_account_number', 'Bank Account Number', 'رقم الحساب المصرفي'],
            ['iban', 'إيبان', 'Iban', 'إيبان'],
            ['payroll_date', 'payroll_date', 'Payroll Date', 'تاريخ الرواتب'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'PayrollManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['payroll_number', 'payroll_number', 'Payroll Number', 'رقم الرواتب'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['payroll_date', 'payroll_date', 'Payroll Date', 'تاريخ الرواتب'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'PayrollReport' => [
            ['from_date', 'من _date', 'From Date', 'من التاريخ'],
            ['to_date', 'to_date', 'To Date', 'حتى الآن'],
            ['total_incentives', 'Total_incentives', 'Total Incentives', 'إجمالي الحوافز'],
            ['total_deductions', 'Total_deductions', 'Total Deductions', 'إجمالي الخصومات'],
            ['total_salaries', 'Total_salaries', 'Total Salaries', 'إجمالي الرواتب'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

        'TaxDeduction' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['taxDeductionTypes', 'أنواع خصم الضرائب', 'Taxdeductiontypes', 'أنواع خصم الضرائب'],
            ['amount', 'كمية', 'Amount', 'كمية'],
            ['deduction_date', 'reduction_date', 'Deduction Date', 'تاريخ الخصم'],
            ['taxDeductionStatuses', 'DoreDuctionStatuses', 'Taxdeductionstatuses', 'DoreDuctionStatuses'],
            ['payrollAttachments', 'Payrollattachments', 'Payrollattachments', 'Payrollattachments']
        ],

            'Payroll' => [
                ['employee', 'موظف', 'Employee', 'موظف'],
                ['basic_salary', 'basic_salary', 'Basic Salary', 'الراتب الأساسي'],
                ['allowances', 'البدلات', 'Allowances', 'البدلات'],
                ['overtime_hours', 'العمل الإضافي', 'Overtime Hours', 'ساعات العمل الإضافي'],
                ['overtime_amount', 'العمل الإضافي', 'Overtime Amount', 'مبلغ العمل الإضافي'],
                ['deductions', 'الخصومات', 'Deductions', 'الخصومات'],
                ['gross_salary', 'gross_salary', 'Gross Salary', 'الراتب الإجمالي'],
                ['net_salary', 'net_salary', 'Net Salary', 'صافي الراتب'],
                ['paymentMethod', 'PaymentMethod', 'Payment Method', 'PaymentMethod'],
                ['currency', 'عملة', 'Currency', 'عملة'],
                ['payment_date', 'payment_date', 'Payment Date', 'تاريخ الدفع'],
                ['payrollAttachments', 'Payrollattachments', 'Payroll Attachments', 'Payrollattachments'],
            ],
            'Incentive' => [
                ['employee', 'موظف', 'Employee', 'موظف'],
                ['incentiveTypes', 'أنواع الحوافز', 'Incentive Types', 'أنواع الحوافز'],
                ['amount', 'كمية', 'Amount', 'كمية'],
                ['issue_date', 'تاريخ الإصدار', 'Issue Date', 'تاريخ الإصدار'],
                ['incentiveStatus', 'الحالة', 'Incentive Status', 'الحالة'],
                 ['performance_rating', 'الأداء', 'Performance Rating', 'تصنيف الأداء'],
                ['payrollAttachments', 'Payrollattachments', 'Payroll Attachments', 'Payrollattachments'],
            ],

        ];

      foreach ($columns as $model => $fields) {
     $exists = DB::table('columns_payrolls')->where('model', $model)->exists();
    if ($exists) {
         continue;
    }

    foreach ($fields as $field) {
        DB::table('columns_payrolls')->insert([
            'model' => $model,
            'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
            'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
            'sortable' => true,
            'filterable' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}

    }
}
