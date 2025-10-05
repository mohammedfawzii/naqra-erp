<?php

use Illuminate\Support\Facades\Route;
use Modules\CmsErp\Http\Controllers\CmsErpController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cmserps', CmsErpController::class)->names('cmserp');
});
