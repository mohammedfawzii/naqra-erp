<?php

use Illuminate\Support\Facades\Route;
use Modules\Performance\Http\Controllers\LearningManagementIntegration\LearningManagementIntegrationController;
use Modules\Performance\Http\Controllers\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightController;
use Modules\Performance\Http\Controllers\EmployeeRecognitionManagement\EmployeeRecognitionManagementController;
use Modules\Performance\Http\Controllers\ContinuousPerformanceManagement\ContinuousPerformanceManagementController;
use Modules\Performance\Http\Controllers\CompetencyManagement\CompetencyManagementController;
use Modules\Performance\Http\Controllers\SuccessionPlanning\SuccessionPlanningController;
use Modules\Performance\Http\Controllers\PromotionReward\PromotionRewardController;
use Modules\Performance\Http\Controllers\Feedback360\Feedback360Controller;
use Modules\Performance\Http\Controllers\DevelopmentPlan\DevelopmentPlanController;
use Modules\Performance\Http\Controllers\Feedback\FeedbackController;
use Modules\Performance\Http\Controllers\Evaluation\EvaluationController;
use Modules\Performance\Http\Controllers\Goal\GoalController;
use Modules\Performance\Http\Controllers\PerformanceController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('performances', PerformanceController::class)->names('performance');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('goals', GoalController::class)->names('goal');
    Route::apiResource('evaluations', EvaluationController::class)->names('evaluation');
    Route::apiResource('feedback', FeedbackController::class)->names('feedback');
    Route::apiResource('development_plans', DevelopmentPlanController::class)->names('development_plan');
    Route::apiResource('feedback360s', Feedback360Controller::class)->names('feedback360');
    Route::apiResource('promotion_rewards', PromotionRewardController::class)->names('promotion_reward');
    Route::apiResource('succession_plannings', SuccessionPlanningController::class)->names('succession_planning');
    Route::apiResource('competency_managements', CompetencyManagementController::class)->names('competency_management');
    Route::apiResource('continuous_performance', ContinuousPerformanceManagementController::class)->names('continuous_performance_management');
    Route::apiResource('employee_recognition_managements', EmployeeRecognitionManagementController::class)->names('employee_recognition_management');
    Route::apiResource('ai_driven_performance_insights', AiDrivenPerformanceInsightController::class)->names('ai_driven_performance_insight');
    Route::apiResource('learning_management_integrations', LearningManagementIntegrationController::class)->names('learning_management_integration');
});
