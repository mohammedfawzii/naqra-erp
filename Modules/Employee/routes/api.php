<?php

use Illuminate\Support\Facades\Route;
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
});
