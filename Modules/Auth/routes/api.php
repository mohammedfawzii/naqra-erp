<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\ForgetPassword\ForgetPasswordController;
use Modules\Auth\Http\Controllers\Auth\Login\LoginController;
use Modules\Auth\Http\Controllers\Auth\Register\RegisterController;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\Verification\VerificationController;

Route::prefix('v1/Auth')->group(function () {
     Route::post('register', [RegisterController::class, 'register']);
    Route::post('register/confirm-verification', [VerificationController::class, 'confirmVerification']);
    Route::post('register/resend-code', [VerificationController::class, 'resendVerificationCode']); // for register
    Route::post('send-code', [VerificationController::class, 'sendVerificationCode']); // for app
    // send code it same resend code with timer
    ////// Login Route
    Route::post('login', [LoginController::class, 'login']);
    Route::post('login-google',[LoginController::class,'google']);
    Route::post('login/by-phone',[VerificationController::class,'sendOtpByPhone']);
    // Route::post('login/send-code-phone')
    Route::post('login/confirm-verification', [VerificationController::class, 'verifyOtpWithToken']);

    
    Route::prefix('password')->group(function () {
    Route::post('sendOtp', [ForgetPasswordController::class, 'sendOtp']);
    Route::post('verify', [ForgetPasswordController::class, 'verify']);
    Route::post('reset', [ForgetPasswordController::class, 'reset']);
});
});


// when resend code on register 