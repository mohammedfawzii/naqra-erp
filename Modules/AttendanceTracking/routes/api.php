<?php

use Illuminate\Support\Facades\Route;
use Modules\AttendanceTracking\Http\Controllers\FlexibleLeaveManagement\FlexibleLeaveManagementController;
use Modules\AttendanceTracking\Http\Controllers\GamificationAttendance\GamificationAttendanceController;
use Modules\AttendanceTracking\Http\Controllers\AiAttendanceInsight\AiAttendanceInsightController;
use Modules\AttendanceTracking\Http\Controllers\AiAttendanceInsights\AiAttendanceInsightsController;
use Modules\AttendanceTracking\Http\Controllers\AbsenceAnalytics\AbsenceAnalyticsController;
use Modules\AttendanceTracking\Http\Controllers\RemoteAttendance\RemoteAttendanceController;
use Modules\AttendanceTracking\Http\Controllers\LeavePolicy\LeavePolicyController;
use Modules\AttendanceTracking\Http\Controllers\BiometricIntegration\BiometricIntegrationController;
use Modules\AttendanceTracking\Http\Controllers\TimeTrackingIntegration\TimeTrackingIntegrationController;
use Modules\AttendanceTracking\Http\Controllers\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceController;
use Modules\AttendanceTracking\Http\Controllers\AttendanceCompliance\AttendanceComplianceController;
use Modules\AttendanceTracking\Http\Controllers\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsController;
use Modules\AttendanceTracking\Http\Controllers\ShiftSchedule\ShiftScheduleController;
use Modules\AttendanceTracking\Http\Controllers\LeaveBalance\LeaveBalanceController;
use Modules\AttendanceTracking\Http\Controllers\LeaveRequest\LeaveRequestController;
use Modules\AttendanceTracking\Http\Controllers\AttendanceTracking\AttendanceTrackingController;

Route::prefix('v1')->group(function () {
     Route::apiResource('attendance_trackings', AttendanceTrackingController::class)->names('attendance_tracking');
    Route::apiResource('leave_requests', LeaveRequestController::class)->names('leave_request');
    Route::apiResource('leave_balances', LeaveBalanceController::class)->names('leave_balance');
    Route::apiResource('shift_schedules', ShiftScheduleController::class)->names('shift_schedule');
    Route::apiResource('attendance_leave_analytics', AttendanceLeaveAnalyticsController::class)->names('attendance_leave_analytics');
    Route::apiResource('attendance_compliances', AttendanceComplianceController::class)->names('attendance_compliance');
    Route::apiResource('employee_leave_self_services', EmployeeLeaveSelfServiceController::class)->names('employee_leave_self_service');
    Route::apiResource('time_tracking_integrations', TimeTrackingIntegrationController::class)->names('time_tracking_integration');
    Route::apiResource('biometric_integrations', BiometricIntegrationController::class)->names('biometric_integration');
    Route::apiResource('leave_policies', LeavePolicyController::class)->names('leave_policy');
    Route::apiResource('remote_attendances', RemoteAttendanceController::class)->names('remote_attendance');
    Route::apiResource('absence_analytics', AbsenceAnalyticsController::class)->names('absence_analytics');

    Route::apiResource('ai_attendance_insights', AiAttendanceInsightController::class)->names('ai_attendance_insight');
    Route::apiResource('gamification_attendances', GamificationAttendanceController::class)->names('gamification_attendance');
    Route::apiResource('flexible_leave_managements', FlexibleLeaveManagementController::class)->names('flexible_leave_management');
});
