<?php

namespace Modules\AttendanceTracking\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'FlexibleLeaveManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['selected_leaves', 'select_leaves', 'Selected Leaves', 'أوراق محددة'],
            ['leave_cost', 'LEEAD_COST', 'Leave Cost', 'ترك التكلفة'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات']
        ],

        'GamificationAttendance' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['attendance_points', 'الحضور', 'Attendance Points', 'نقاط الحضور'],
            ['earned_rewards', 'onned_rewards', 'Earned Rewards', 'المكافآت المكتسبة'],
            ['progress_level', 'Progress_level', 'Progress Level', 'مستوى التقدم']
        ],

        'AiAttendanceInsight' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['ai_recommendation', 'AI_RECOMMENDATION', 'Ai Recommendation', 'توصية الذكاء الاصطناعي'],
            ['probability_score', 'احتمال', 'Probability Score', 'درجة الاحتمالات'],
            ['analysis_date', 'analysis_date', 'Analysis Date', 'تاريخ التحليل']
        ],

        'AbsenceAnalytics' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['time_period', 'time_period', 'Time Period', 'الفترة الزمنية'],
            ['absence_rate', 'غياب', 'Absence Rate', 'معدل الغياب'],
            ['absence_reason', 'الغياب', 'Absence Reason', 'سبب الغياب']
        ],

        'RemoteAttendance' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['attendance_location', 'الحضور', 'Attendance Location', 'موقع الحضور'],
            ['remote_check_in_time', 'remote_check_in_time', 'Remote Check In Time', 'فحص عن بُعد في الوقت المناسب'],
            ['remote_check_out_time', 'remote_check_out_time', 'Remote Check Out Time', 'راجع الوقت البعيد']
        ],

        'LeavePolicy' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['policy_description', 'Policy_description', 'Policy Description', 'وصف السياسة'],
            ['annual_balance', 'سنوي', 'Annual Balance', 'التوازن السنوي']
        ],

        'BiometricIntegration' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['biometric_type', 'biometric_type', 'Biometric Type', 'نوع القياس الحيوي'],
            ['registration_date', 'التسجيل', 'Registration Date', 'تاريخ التسجيل']
        ],

        'TimeTrackingIntegration' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['system_name', 'system_name', 'System Name', 'اسم النظام'],
            ['integration_type', 'integration_type', 'Integration Type', 'نوع التكامل'],
            ['integration_status', 'integration_status', 'Integration Status', 'حالة التكامل']
        ],

        'EmployeeLeaveSelfService' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['request_status', 'request_status', 'Request Status', 'طلب الحالة']
        ],

        'AttendanceCompliance' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['compliance_type', 'الامتثال _type', 'Compliance Type', 'نوع الامتثال'],
            ['compliance_status', 'الامتثال_ستاتوس', 'Compliance Status', 'حالة الامتثال'],
            ['review_date', 'Review_Date', 'Review Date', 'تاريخ المراجعة']
        ],

        'AttendanceLeaveAnalytics' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['time_period', 'time_period', 'Time Period', 'الفترة الزمنية'],
            ['attendance_rate', 'الحضور', 'Attendance Rate', 'معدل الحضور'],
            ['absence_rate', 'غياب', 'Absence Rate', 'معدل الغياب'],
            ['leave_taken_report', 'LEEAD_TAKEN_REPORT', 'Leave Taken Report', 'اترك التقرير أخذ']
        ],

        'ShiftSchedule' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['shift_type', 'Shift_type', 'Shift Type', 'نوع التحول'],
            ['shift_date', 'Shift_date', 'Shift Date', 'تاريخ التحول'],
            ['start_time', 'start_time', 'Start Time', 'وقت البدء'],
            ['end_time', 'end_time', 'End Time', 'وقت الانتهاء']
        ],

        'LeaveBalance' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['available_balance', 'Available_Balance', 'Available Balance', 'التوازن المتاح'],
            ['used_balance', 'use_balance', 'Used Balance', 'التوازن المستخدم'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور']
        ],

        'LeaveRequest' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['holidaysList', 'العطلات', 'Holidayslist', 'العطلات'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['request_status', 'request_status', 'Request Status', 'طلب الحالة']
        ],

        'AttendanceTracking' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachment', 'مرفق', 'Attachment', 'مرفق'],
            ['attendance_date', 'الحضور', 'Attendance Date', 'تاريخ الحضور'],
            ['attendance_type', 'الحضور', 'Attendance Type', 'نوع الحضور'],
            ['check_in_time', 'check_in_time', 'Check In Time', 'تحقق في الوقت'],
            ['check_out_time', 'check_out_time', 'Check Out Time', 'تحقق من الوقت'],
            ['overtime_hours', 'العمل الإضافي', 'Overtime Hours', 'ساعات العمل الإضافي'],
            ['working_hours', 'works_hours', 'Working Hours', 'ساعات العمل']
        ],


        ];

        foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('columns_attendance_trackings')->insert([
                    'model' => $model,
                    'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
