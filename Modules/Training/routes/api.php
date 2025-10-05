<?php

use Illuminate\Support\Facades\Route;
use Modules\Training\Http\Controllers\FieldTrainingManagement\FieldTrainingManagementController;
use Modules\Training\Http\Controllers\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationController;
use Modules\Training\Http\Controllers\GamificationForTraining\GamificationForTrainingController;
use Modules\Training\Http\Controllers\LicensingAndCertificationManagement\LicensingAndCertificationManagementController;
use Modules\Training\Http\Controllers\TrainingNeedsAssessment\TrainingNeedsAssessmentController;
use Modules\Training\Http\Controllers\ELearningManagement\ELearningManagementController;
use Modules\Training\Http\Controllers\InternalTrainingManagement\InternalTrainingManagementController;
use Modules\Training\Http\Controllers\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationController;
use Modules\Training\Http\Controllers\TrainingEvaluation\TrainingEvaluationController;
use Modules\Training\Http\Controllers\CertificationManagement\CertificationManagementController;
use Modules\Training\Http\Controllers\CourseTracking\CourseTrackingController;
use Modules\Training\Http\Controllers\TrainingController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('trainings', TrainingController::class)->names('training');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('course_trackings', CourseTrackingController::class)->names('course_tracking');
    Route::apiResource('certification_managements', CertificationManagementController::class)->names('certification_management');
    Route::apiResource('training_evaluations', TrainingEvaluationController::class)->names('training_evaluation');
    Route::apiResource('external_learning_platform', ExternalLearningPlatformIntegrationController::class)->names('external_learning_platform');
    Route::apiResource('internal_training', InternalTrainingManagementController::class)->names('internal_training_management');
    Route::apiResource('e_learning_managements', ELearningManagementController::class)->names('e_learning_management');
    Route::apiResource('training_needs_assessments', TrainingNeedsAssessmentController::class)->names('training_needs_assessment');
    Route::apiResource('licensing_and_certification', LicensingAndCertificationManagementController::class)->names('licensing_and_certification');
    Route::apiResource('gamification_for_trainings', GamificationForTrainingController::class)->names('gamification_for_training');
    Route::apiResource('a_i_driven_learning', AIDrivenLearningRecommendationController::class)->names('a_i_driven_learning');
    Route::apiResource('field_training_managements', FieldTrainingManagementController::class)->names('field_training_management');
});
