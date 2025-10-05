<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AttendanceTracking\Models\InfoAttendanceTracking;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'infoable_type' => 'FlexibleLeaveManagement',
                'title' => ['en' => 'Flexibleleavemanagement', 'ar' => 'FlexIbleleaveManagement'],
                'desc'  => ['en' => 'Description for Flexibleleavemanagement', 'ar' => 'وصف لـ FlexIbleleAveManagement'],
            ],            [
                'infoable_type' => 'GamificationAttendance',
                'title' => ['en' => 'Gamificationattendance', 'ar' => 'حضور gamification'],
                'desc'  => ['en' => 'Description for Gamificationattendance', 'ar' => 'الوصف لـ GamificateTendance'],
            ],            [
                'infoable_type' => 'AiAttendanceInsight',
                'title' => ['en' => 'Aiattendanceinsight', 'ar' => 'aiattendanceinsight'],
                'desc'  => ['en' => 'Description for Aiattendanceinsight', 'ar' => 'وصف لـ AiattendanceInsight'],
            ],              [
                'infoable_type' => 'AbsenceAnalytics',
                'title' => ['en' => 'Absenceanalytics', 'ar' => 'الغياب'],
                'desc'  => ['en' => 'Description for Absenceanalytics', 'ar' => 'وصف لتحليلات الغياب'],
            ],            [
                'infoable_type' => 'RemoteAttendance',
                'title' => ['en' => 'Remoteattendance', 'ar' => 'الحضور عن بعد'],
                'desc'  => ['en' => 'Description for Remoteattendance', 'ar' => 'وصف للحضور عن بُعد'],
            ],            [
                'infoable_type' => 'LeavePolicy',
                'title' => ['en' => 'Leavepolicy', 'ar' => 'ترك السياسة'],
                'desc'  => ['en' => 'Description for Leavepolicy', 'ar' => 'وصف سياسة الإجازة'],
            ],            [
                'infoable_type' => 'BiometricIntegration',
                'title' => ['en' => 'Biometricintegration', 'ar' => 'التكامل الحيوي'],
                'desc'  => ['en' => 'Description for Biometricintegration', 'ar' => 'وصف للتكامل الحيوي'],
            ],            [
                'infoable_type' => 'TimeTrackingIntegration',
                'title' => ['en' => 'Timetrackingintegration', 'ar' => 'TimetrackingIntemration'],
                'desc'  => ['en' => 'Description for Timetrackingintegration', 'ar' => 'وصف ل timeTrackingIntemration'],
            ],            [
                'infoable_type' => 'EmployeeLeaveSelfService',
                'title' => ['en' => 'Employeeleaveselfservice', 'ar' => 'sterforeeleaveselfservice'],
                'desc'  => ['en' => 'Description for Employeeleaveselfservice', 'ar' => 'الوصف لتوظيف elforeeleveselfservice'],
            ],            [
                'infoable_type' => 'AttendanceCompliance',
                'title' => ['en' => 'Attendancecompliance', 'ar' => 'الامتثال لحضور'],
                'desc'  => ['en' => 'Description for Attendancecompliance', 'ar' => 'وصف لامتثال الحضور'],
            ],            [
                'infoable_type' => 'AttendanceLeaveAnalytics',
                'title' => ['en' => 'Attendanceleaveanalytics', 'ar' => 'الحضور'],
                'desc'  => ['en' => 'Description for Attendanceleaveanalytics', 'ar' => 'وصف للالتقاء'],
            ],            [
                'infoable_type' => 'ShiftSchedule',
                'title' => ['en' => 'Shiftschedule', 'ar' => 'التحولات'],
                'desc'  => ['en' => 'Description for Shiftschedule', 'ar' => 'الوصف لطرح التحول'],
            ],            [
                'infoable_type' => 'LeaveBalance',
                'title' => ['en' => 'Leavebalance', 'ar' => 'تركية'],
                'desc'  => ['en' => 'Description for Leavebalance', 'ar' => 'وصف لليغ'],
            ],            [
                'infoable_type' => 'LeaveRequest',
                'title' => ['en' => 'Leaverequest', 'ar' => 'leaverequest'],
                'desc'  => ['en' => 'Description for Leaverequest', 'ar' => 'الوصف لـ leaverequest'],
            ],            [
                'infoable_type' => 'AttendanceTracking',
                'title' => ['en' => 'Attendancetracking', 'ar' => 'تتبع الحضور'],
                'desc'  => ['en' => 'Description for Attendancetracking', 'ar' => 'وصف لتتبع الحضور'],
            ],
        ];

        foreach ($records as $record) {
            InfoAttendanceTracking::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
