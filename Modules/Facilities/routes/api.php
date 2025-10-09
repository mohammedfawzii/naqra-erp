<?php

use Illuminate\Support\Facades\Route;
use Modules\Facilities\Http\Controllers\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesController;
use Modules\Facilities\Http\Controllers\PeriodicObligations\PeriodicObligationsController;
use Modules\Facilities\Http\Controllers\SubscriptionFacilities\SubscriptionFacilitiesController;
use Modules\Facilities\Http\Controllers\DigitalFacility\DigitalFacilityController;
use Modules\Facilities\Http\Controllers\OwnerForeignCompany\OwnerForeignCompanyController;
use Modules\Facilities\Http\Controllers\OwnerEndowment\OwnerEndowmentController;
use Modules\Facilities\Http\Controllers\OwnerGulfCompany\OwnerGulfCompanyController;
use Modules\Facilities\Http\Controllers\OwnerResident\OwnerResidentController;
use Modules\Facilities\Http\Controllers\OwnerGulf\OwnerGulfController;
use Modules\Facilities\Http\Controllers\OwnerSaudiIndividual\OwnerSaudiIndividualController;
use Modules\Facilities\Http\Controllers\OwnerAssociation\OwnerAssociationController;
use Modules\Facilities\Http\Controllers\Owner\OwnerController;
use Modules\Facilities\Http\Controllers\Branch\BranchController;
use Modules\Facilities\Http\Controllers\Facilities\FacilitiesController;
 
Route::prefix('v1/facility')->group(function () {
    Route::apiResource('facilities', FacilitiesController::class);
    Route::apiResource('branches', BranchController::class);
    Route::apiResource('digital', DigitalFacilityController::class);
    Route::apiResource('subscriptions', SubscriptionFacilitiesController::class);
    Route::apiResource('periodic-obligations', PeriodicObligationsController::class);
    Route::apiResource('medical-insurances', MedicalInsurancesFacilitiesController::class);
});

Route::prefix('v1/facility/owner')->group(function(){
   Route::apiResource('owners', OwnerController::class);
    Route::apiResource('associations', OwnerAssociationController::class);
    Route::apiResource('saudi-individuals', OwnerSaudiIndividualController::class);
    Route::apiResource('gulfs', OwnerGulfController::class);
    Route::apiResource('residents', OwnerResidentController::class);
    Route::apiResource('gulf-companies', OwnerGulfCompanyController::class);
    Route::apiResource('endowments', OwnerEndowmentController::class);
    Route::apiResource('foreign-companies', OwnerForeignCompanyController::class);
});
