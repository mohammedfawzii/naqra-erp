<?php

use Illuminate\Support\Facades\Route;
use Modules\ExitManagement\Http\Controllers\ExitManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('exitmanagements', ExitManagementController::class)->names('exitmanagement');
});
