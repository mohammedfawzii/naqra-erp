<?php

use Illuminate\Support\Facades\Route;
use Modules\AttendanceTracking\Http\Controllers\AttendanceTrackingController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('attendancetrackings', AttendanceTrackingController::class)->names('attendancetracking');
});
