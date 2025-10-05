<?php

namespace Modules\Payroll\Database\Seeders;

use Illuminate\Database\Seeder;

class PayrollDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(ChatbotforPayroll\ChatbotforPayrollSeeder::class);
        $this->call(MultiCountryPayroll\MultiCountryPayrollSeeder::class);
        $this->call(EndofServiceCalculations\EndofServiceCalculationsSeeder::class);
        $this->call(LoanType\LoanTypeSeeder::class);
        $this->call(LoanDeductions\LoanDeductionsSeeder::class);
        $this->call(PaidLeaveManagement\PaidLeaveManagementSeeder::class);
        $this->call(PayrollAnalytics\PayrollAnalyticsSeeder::class);
        $this->call(PayrollProfile\PayrollProfileSeeder::class);
        $this->call(BenefitEmployee\BenefitEmployeeSeeder::class);
        $this->call(BenefitType\BenefitTypeSeeder::class);
        $this->call(AttendanceManagement\AttendanceManagementSeeder::class);
        $this->call(EmployeePaymentManagement\EmployeePaymentManagementSeeder::class);
        $this->call(PayrollManagement\PayrollManagementSeeder::class);
        $this->call(PayrollReport\PayrollReportSeeder::class);

           $this->call([
            IncentiveType\IncentiveTypeSeeder::class,
            IncentiveStatus\IncentiveStatusSeeder::class,
            Incentive\IncentiveSeeder::class,
            Payroll\PayrollSeeder::class,
            ColumnsSeeder::class,
            InfoSeeder::class,
            PayrollAttachment\PayrollAttachmentSeeder::class,
            TaxDeductionType\TaxDeductionTypeSeeder::class,
            TaxDeductionStatus\TaxDeductionStatusSeeder::class,
            TaxDeduction\TaxDeductionSeeder::class

        ]);

          // $this->call([]);
    }
}
