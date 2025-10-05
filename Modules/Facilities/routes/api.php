<?php

use Illuminate\Support\Facades\Route;
use Modules\Facilities\Http\Controllers\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesController;
use Modules\Facilities\Http\Controllers\MedicalInsuranceFacilities\MedicalInsuranceFacilitiesController;
 use Modules\Facilities\Http\Controllers\periodicObligations\periodicObligationsController;
use Modules\Facilities\Http\Controllers\SubscriptionFacilities\SubscriptionFacilitiesController;
use Modules\Facilities\Http\Controllers\License\LicenseController;
use Modules\Facilities\Http\Controllers\Branches\BranchesController;
use Modules\Facilities\Http\Controllers\DigitalFacility\DigitalFacilityController;
  use Modules\Facilities\Http\Controllers\FacilityAttachments\FacilityAttachmentsController;
 use Modules\Facilities\Http\Controllers\Owner\OwnerController;
use Modules\Facilities\Http\Controllers\Facilities\FacilitiesController;
 use Modules\Facilities\Http\Controllers\User\UserController;

Route::prefix('v1')->group(function () {
    Route::apiResource('medical_insurances_facilities', MedicalInsurancesFacilitiesController::class)->names('medical_insurances_facilities');
      Route::apiResource('periodic_obligations', periodicObligationsController::class)->names('periodic_obligations');
    Route::apiResource('subscription_facilities', SubscriptionFacilitiesController::class)->names('subscription_facilities');
    Route::apiResource('licenses', LicenseController::class)->names('license');
    Route::apiResource('branches', BranchesController::class)->names('branches');
    Route::apiResource('digital_facilities', DigitalFacilityController::class)->names('digital_facility');
      Route::apiResource('facility_attachments', FacilityAttachmentsController::class)->names('facility_attachments');
     Route::apiResource('owners', OwnerController::class)->names('owner');
    Route::apiResource('facilities', FacilitiesController::class)->names('facilities');
     Route::apiResource('users', UserController::class)->names('user');
});
