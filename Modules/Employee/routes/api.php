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

Route::prefix('v1/employee')->group(function () {
     Route::apiResource('base-information', BaseInformationEmployeeController::class)->names('base_information_employee');
    Route::apiResource('personal-information', PersonalInformationEmployeeController::class)->names('personal_information_employee');
    Route::apiResource('dependents', EmployeeDebendentController::class)->names('employee_debendent');
    Route::apiResource('addresses', EmployeeAddressController::class)->names('employee_address');
    Route::apiResource('experiences', EmployeeExperienceController::class)->names('employee_experience');
    Route::apiResource('languages', EmployeeLanguageController::class)->names('employee_language');
    Route::apiResource('skills', EmployeeSkillController::class)->names('employee_skill');
    Route::apiResource('courses', EmployeeCourseController::class)->names('employee_course');
    Route::apiResource('qualifications', EmployeeQualificationController::class)->names('employee_qualification');
    Route::apiResource('contacts', EmployeeContactController::class)->names('employee_contact');
    Route::apiResource('medical-insurance-categories', EmployeeMedicalRecordController::class)->names('employee_medical_record');
    Route::apiResource('financial-entitlements', EmployeeFinancialEntitlementController::class)->names('employee_financial_entitlement');
    Route::apiResource('allowances', EmployeeAllowanceController::class)->names('employee_allowance');
    Route::apiResource('other-entitlements', EmployeeOtherEntitlementController::class)->names('employee_other_entitlement');
    Route::apiResource('attendance', AttendanceEmployeeController::class)->names('attendance_employee');
    Route::apiResource('holidays', EmployeeHolidayController::class)->names('employee_holiday');
    Route::apiResource('accounts', EmployeeAccountController::class)->names('employee_account');
});
