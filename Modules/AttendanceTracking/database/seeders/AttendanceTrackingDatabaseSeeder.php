<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Database\Seeders\AttendanceTrackingAttachment\AttendanceTrackingAttachmentSeeder;

class AttendanceTrackingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(FlexibleLeaveManagement\FlexibleLeaveManagementSeeder::class);
        $this->call(GamificationAttendance\GamificationAttendanceSeeder::class);
        $this->call(AiAttendanceInsight\AiAttendanceInsightSeeder::class);
         $this->call(AbsenceAnalytics\AbsenceAnalyticsSeeder::class);
        $this->call(RemoteAttendance\RemoteAttendanceSeeder::class);
        $this->call(LeavePolicy\LeavePolicySeeder::class);
        $this->call(BiometricIntegration\BiometricIntegrationSeeder::class);
        $this->call(TimeTrackingIntegration\TimeTrackingIntegrationSeeder::class);
        $this->call(EmployeeLeaveSelfService\EmployeeLeaveSelfServiceSeeder::class);
        $this->call(AttendanceCompliance\AttendanceComplianceSeeder::class);
        $this->call(AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsSeeder::class);
        $this->call(ShiftSchedule\ShiftScheduleSeeder::class);
        $this->call(LeaveBalance\LeaveBalanceSeeder::class);
        $this->call(LeaveRequest\LeaveRequestSeeder::class);
        $this->call(AttendanceTracking\AttendanceTrackingSeeder::class);
           $this->call([
             ColumnsSeeder::class,
            InfoSeeder::class,
            AttendanceTrackingAttachmentSeeder::class

         ]);
    }
}
