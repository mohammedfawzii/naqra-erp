<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\Http\Controllers\EmployeeAccount\EmployeeAccountController;
use Modules\Employee\Http\Controllers\EmployeeHoliday\EmployeeHolidayController;
use Modules\Employee\Http\Controllers\AttendanceEmployee\AttendanceEmployeeController;
use Modules\Employee\Http\Controllers\EmployeeOtherEntitlement\EmployeeOtherEntitlementController;
use Modules\Employee\Http\Controllers\EmployeeAllowance\EmployeeAllowanceController;
use Modules\Employee\Http\Controllers\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementController;
use Modules\Employee\Http\Controllers\EmployeeMedicalRecord\EmployeeMedicalRecordController;
use Modules\Employee\Http\Controllers\EmployeeContact\EmployeeContactController;
use Modules\Employee\Http\Controllers\EmployeeQualification\EmployeeQualificationController;
use Modules\Employee\Http\Controllers\EmployeeCourse\EmployeeCourseController;
use Modules\Employee\Http\Controllers\EmployeeSkill\EmployeeSkillController;
use Modules\Employee\Http\Controllers\EmployeeLanguage\EmployeeLanguageController;
use Modules\Employee\Http\Controllers\EmployeeExperience\EmployeeExperienceController;
use Modules\Employee\Http\Controllers\EmployeeAddress\EmployeeAddressController;
use Modules\Employee\Http\Controllers\EmployeeDebendent\EmployeeDebendentController;
use Modules\Employee\Http\Controllers\PersonalInformationEmployee\PersonalInformationEmployeeController;
use Modules\Employee\Http\Controllers\BaseInformationEmployee\BaseInformationEmployeeController;
use Modules\Employee\Http\Controllers\EmployeeController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('employees', EmployeeController::class)->names('employee');
});

Route::prefix('v1')->group(function () {
     Route::apiResource('base_information_employees', BaseInformationEmployeeController::class)->names('base_information_employee');
    Route::apiResource('personal_information_employees', PersonalInformationEmployeeController::class)->names('personal_information_employee');
    Route::apiResource('employee_debendents', EmployeeDebendentController::class)->names('employee_debendent');
    Route::apiResource('employee_addresses', EmployeeAddressController::class)->names('employee_address');
    Route::apiResource('employee_experiences', EmployeeExperienceController::class)->names('employee_experience');
    Route::apiResource('employee_languages', EmployeeLanguageController::class)->names('employee_language');
    Route::apiResource('employee_skills', EmployeeSkillController::class)->names('employee_skill');
    Route::apiResource('employee_courses', EmployeeCourseController::class)->names('employee_course');
    Route::apiResource('employee_qualifications', EmployeeQualificationController::class)->names('employee_qualification');
    Route::apiResource('employee_contacts', EmployeeContactController::class)->names('employee_contact');
    Route::apiResource('employeeMedicalInsuranceCategori', EmployeeMedicalRecordController::class)->names('employee_medical_record');
    Route::apiResource('employee_financial_entitlements', EmployeeFinancialEntitlementController::class)->names('employee_financial_entitlement');
    Route::apiResource('employee_allowances', EmployeeAllowanceController::class)->names('employee_allowance');
    Route::apiResource('employee_other_entitlements', EmployeeOtherEntitlementController::class)->names('employee_other_entitlement');
    Route::apiResource('attendance_employees', AttendanceEmployeeController::class)->names('attendance_employee');
    Route::apiResource('employee_holidays', EmployeeHolidayController::class)->names('employee_holiday');
    Route::apiResource('employee_accounts', EmployeeAccountController::class)->names('employee_account');
});
