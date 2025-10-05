<?php

use Illuminate\Support\Facades\Route;
use Modules\ExitManagement\Http\Controllers\ExitManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('exitmanagements', ExitManagementController::class)->names('exitmanagement');
});
