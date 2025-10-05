<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns =[
        'LearningManagementIntegration' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['learning_platform', 'Learning_platform', 'Learning Platform', 'منصة التعلم'],
            ['integration_status', 'integration_status', 'Integration Status', 'حالة التكامل'],
            ['suggested_course', 'مقترح', 'Suggested Course', 'بالطبع المقترح']
        ],

        'AiDrivenPerformanceInsight' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['ai_recommendation', 'AI_RECOMMENDATION', 'Ai Recommendation', 'توصية الذكاء الاصطناعي'],
            ['probability_score', 'احتمال', 'Probability Score', 'درجة الاحتمالات'],
            ['analysis_date', 'analysis_date', 'Analysis Date', 'تاريخ التحليل']
        ],

        'EmployeeRecognitionManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['recognition_type', 'التعرف', 'Recognition Type', 'نوع التعرف'],
            ['recognition_description', 'التعرف على _description', 'Recognition Description', 'وصف التعرف'],
            ['recognition_date', 'التعرف على', 'Recognition Date', 'تاريخ الاعتراف']
        ],

        'ContinuousPerformanceManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['activity', 'نشاط', 'Activity', 'نشاط'],
            ['activity_date', 'Activity_date', 'Activity Date', 'تاريخ النشاط'],
            ['ongoing_rating', 'مستمر', 'Ongoing Rating', 'تصنيف مستمر'],
            ['description', 'وصف', 'Description', 'وصف']
        ],

        'CompetencyManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['competency', 'الكفاءة', 'Competency', 'الكفاءة'],
            ['competency_rating', 'تصنيف الكفاءة', 'Competency Rating', 'تصنيف الكفاءة'],
            ['target_competency', 'Target_competency', 'Target Competency', 'الكفاءة الهدف']
        ],

        'SuccessionPlanning' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['position', 'موضع', 'Position', 'موضع'],
            ['readiness_rating', 'الاستعداد', 'Readiness Rating', 'تصنيف الاستعداد'],
            ['development_plan', 'Development_plan', 'Development Plan', 'خطة التنمية']
        ],

        'PromotionReward' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['reward_type', 'مكافأة', 'Reward Type', 'نوع المكافأة'],
            ['reward_date', 'مكافأة', 'Reward Date', 'تاريخ المكافأة']
        ],

        'Feedback360' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['evaluator_name', 'المقيِّم', 'Evaluator Name', 'اسم المقيِّم'],
            ['evaluator_designation', 'المقيِّم', 'Evaluator Designation', 'تعيين المقيِّم'],
            ['rating', 'تصنيف', 'Rating', 'تصنيف'],
            ['comment', 'تعليق', 'Comment', 'تعليق'],
            ['source', 'مصدر', 'Source', 'مصدر']
        ],

        'DevelopmentPlan' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['description', 'وصف', 'Description', 'وصف'],
            ['targeted_skills', 'Target_skills', 'Targeted Skills', 'المهارات المستهدفة'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['status', 'حالة', 'Status', 'حالة']
        ],

        'Feedback' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['type', 'يكتب', 'Type', 'يكتب'],
            ['comment', 'تعليق', 'Comment', 'تعليق'],
            ['feedback_date', 'ردود الفعل', 'Feedback Date', 'تاريخ التغذية المرتدة'],
            ['sender_name', 'sender_name', 'Sender Name', 'اسم المرسل']
        ],

        'Evaluation' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['evaluation_date', 'التقييم', 'Evaluation Date', 'تاريخ التقييم'],
            ['rating', 'تصنيف', 'Rating', 'تصنيف'],
            ['comments', 'تعليقات', 'Comments', 'تعليقات'],
            ['competencies', 'الكفاءات', 'Competencies', 'الكفاءات']
        ],

        'Goal' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attendanceAttachments', 'مرفقات الحضور', 'Attendanceattachments', 'مرفقات الحضور'],
            ['employeeinfo', 'الموظف', 'Employeeinfo', 'الموظف'],
            ['goal_name', 'الهدف', 'Goal Name', 'اسم الهدف'],
            ['goal_description', 'الهدف _description', 'Goal Description', 'وصف الهدف'],
            ['goal_measure', 'الهدف', 'Goal Measure', 'مقياس الهدف'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['goal_status', 'الهدف_ستاتوس', 'Goal Status', 'حالة الهدف'],
            ['goal_priority', 'الهدف', 'Goal Priority', 'أولوية الهدف']
        ],
];

        foreach ($columns as $model => $fields) {
            $exists = DB::table('column_performances')->where('model', $model)->exists();
            if ($exists) {
                continue;
            }

            foreach ($fields as $field) {
                DB::table('column_performances')->insert([
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
