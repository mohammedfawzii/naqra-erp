<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\Http\Controllers\ChatbotforPayroll\ChatbotforPayrollController;
use Modules\Payroll\Http\Controllers\MultiCountryPayroll\MultiCountryPayrollController;
use Modules\Payroll\Http\Controllers\EndofServiceCalculationscls\EndofServiceCalculationsclsController;
use Modules\Payroll\Http\Controllers\EndofServiceCalculations\EndofServiceCalculationsController;
use Modules\Payroll\Http\Controllers\LoanType\LoanTypeController;
use Modules\Payroll\Http\Controllers\LoanDeductions\LoanDeductionsController;
  use Modules\Payroll\Http\Controllers\PaidLeaveManagement\PaidLeaveManagementController;
use Modules\Payroll\Http\Controllers\PayrollAnalytics\PayrollAnalyticsController;
use Modules\Payroll\Http\Controllers\PayrollProfile\PayrollProfileController;
use Modules\Payroll\Http\Controllers\BenefitEmployee\BenefitEmployeeController;
use Modules\Payroll\Http\Controllers\BenefitType\BenefitTypeController;
use Modules\Payroll\Http\Controllers\AttendanceManagement\AttendanceManagementController;
use Modules\Payroll\Http\Controllers\EmployeePaymentManagement\EmployeePaymentManagementController;
use Modules\Payroll\Http\Controllers\PayrollManagement\PayrollManagementController;
use Modules\Payroll\Http\Controllers\PayrollReport\PayrollReportController;
use Modules\Payroll\Http\Controllers\TaxDeduction\TaxDeductionController;
use Modules\Payroll\Http\Controllers\TaxDeductionType\TaxDeductionTypeController;
use Modules\Payroll\Http\Controllers\TaxDeductionStatus\TaxDeductionStatusController;
use Modules\Payroll\Http\Controllers\IncentiveStatus\IncentiveStatusController;
use Modules\Payroll\Http\Controllers\IncentiveType\IncentiveTypeController;
use Modules\Payroll\Http\Controllers\Incentive\IncentiveController;
use Modules\Payroll\Http\Controllers\PayrollAttachment\PayrollAttachmentController;
use Modules\Payroll\Http\Controllers\Payroll\PayrollController;

Route::prefix('v1/payroll')->group(function () {
    Route::apiResource('attachments', PayrollAttachmentController::class)->names('attachments');
    Route::apiResource('payrolls', PayrollController::class)->names('payroll');
    Route::apiResource('incentives', IncentiveController::class)->names('incentive');
    Route::apiResource('tax_deductions', TaxDeductionController::class)->names('tax_deduction');
    Route::apiResource('tax_deduction_types', TaxDeductionTypeController::class)->names('tax_deduction_type');
    Route::apiResource('tax_deduction_statuses', TaxDeductionStatusController::class)->names('tax_deduction_status');
    Route::apiResource('incentive_statuses', IncentiveStatusController::class)->names('incentive_status');
    Route::apiResource('incentive_types', IncentiveTypeController::class)->names('incentive_type');
    Route::apiResource('payroll_reports', PayrollReportController::class)->names('payroll_report');
    Route::apiResource('payroll_managements', PayrollManagementController::class)->names('payroll_management');
    Route::apiResource('employee_payment_managements', EmployeePaymentManagementController::class)->names('employee_payment_management');
    Route::apiResource('attendance_managements', AttendanceManagementController::class)->names('attendance_management');
    Route::apiResource('benefit_employees', BenefitEmployeeController::class)->names('benefit_employee');
    Route::apiResource('benefit_types', BenefitTypeController::class)->names('benefit_type');
        Route::apiResource('payroll_profiles', PayrollProfileController::class)->names('payroll_profile');
    Route::apiResource('payroll_analytics', PayrollAnalyticsController::class)->names('payroll_analytics');
   Route::apiResource('paid_leave_managements', PaidLeaveManagementController::class)->names('paid_leave_management');
       Route::apiResource('loan_deductions', LoanDeductionsController::class)->names('loan_deductions');
 Route::apiResource('loan_types', LoanTypeController::class)->names('loan_type');
    Route::apiResource('endof_service_calculations', EndofServiceCalculationsController::class)->names('endof_service_calculations');
      Route::apiResource('endof_service_calculationscls', EndofServiceCalculationsclsController::class)->names('endof_service_calculationscls');
    Route::apiResource('multi_country_payrolls', MultiCountryPayrollController::class)->names('multi_country_payroll');

    Route::apiResource('chatbotfor_payrolls', ChatbotforPayrollController::class)->names('chatbotfor_payroll');




});













Route::prefix('v1')->group(function () {


});
