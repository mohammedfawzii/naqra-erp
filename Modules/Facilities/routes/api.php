<?php

use Illuminate\Support\Facades\Route;

use Modules\Facilities\Http\Controllers\Facilities\FacilitiesController;
 
Route::prefix('v1')->group(function () {
     Route::apiResource('facilities', FacilitiesController::class)->names('facilities');
});
