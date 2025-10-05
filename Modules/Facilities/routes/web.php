<?php

use Illuminate\Support\Facades\Route;
use Modules\Facilities\Http\Controllers\FacilitiesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('facilities', FacilitiesController::class)->names('facilities');
});
