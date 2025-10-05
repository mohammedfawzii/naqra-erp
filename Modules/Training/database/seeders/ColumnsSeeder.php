<?php

namespace Modules\Training\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns =[
        'FieldTrainingManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['training_description', 'التدريب _description', 'Training Description', 'وصف التدريب'],
            ['training_location', 'التدريب', 'Training Location', 'موقع التدريب'],
            ['duration', 'مدة', 'Duration', 'مدة'],
            ['status', 'حالة', 'Status', 'حالة']
        ],

        'AIDrivenLearningRecommendation' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['recommended_course', 'الموصى بها', 'Recommended Course', 'الدورة الموصى بها'],
            ['recommendation_reason', 'توصية', 'Recommendation Reason', 'سبب التوصية'],
            ['fit_score', 'FIT_SCORE', 'Fit Score', 'النتيجة الملائمة']
        ],

        'GamificationForTraining' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['training_points', 'Training_Points', 'Training Points', 'نقاط التدريب'],
            ['earned_rewards', 'onned_rewards', 'Earned Rewards', 'المكافآت المكتسبة'],
            ['progress_level', 'Progress_level', 'Progress Level', 'مستوى التقدم']
        ],

        'LicensingAndCertificationManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['license_name', 'الترخيص', 'License Name', 'اسم الترخيص'],
            ['renewal_date', 'readial_date', 'Renewal Date', 'تاريخ التجديد'],
            ['renewal_status', 'Renewal_status', 'Renewal Status', 'حالة التجديد']
        ],

        'TrainingNeedsAssessment' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['needs', 'الاحتياجات', 'Needs', 'الاحتياجات'],
            ['needs_priority', 'الاحتياجات', 'Needs Priority', 'يحتاج الأولوية'],
            ['needs_source', 'احتياجات', 'Needs Source', 'يحتاج مصدر']
        ],

        'ELearningManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['course_link', 'courselink', 'Course Link', 'رابط المسار'],
            ['progress', 'تقدم', 'Progress', 'تقدم'],
            ['completion_time', 'الانتهاء', 'Completion Time', 'وقت الانتهاء']
        ],

        'InternalTrainingManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['course', 'دورة', 'Course', 'دورة'],
            ['trainer_name', 'Trainer_Name', 'Trainer Name', 'اسم المدرب'],
            ['location', 'موقع', 'Location', 'موقع']
        ],

        'ExternalLearningPlatformIntegration' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['platform_name', 'Platform_Name', 'Platform Name', 'اسم المنصة'],
            ['integration_status', 'integration_status', 'Integration Status', 'حالة التكامل'],
            ['last_sync_date', 'last_sync_date', 'Last Sync Date', 'آخر تاريخ المزامنة']
        ],

        'TrainingEvaluation' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['course', 'دورة', 'Course', 'دورة'],
            ['rating', 'تصنيف', 'Rating', 'تصنيف'],
            ['feedback', 'تعليق', 'Feedback', 'تعليق'],
            ['satisfaction_level', 'الرضا', 'Satisfaction Level', 'مستوى الرضا']
        ],

        'CertificationManagement' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['certification_name', 'certification_name', 'Certification Name', 'اسم الشهادة'],
            ['issue_date', 'تاريخ الإصدار', 'Issue Date', 'تاريخ الإصدار'],
            ['expiration_date', 'تاريخ انتهاء الصلاحية', 'Expiration Date', 'تاريخ انتهاء الصلاحية'],
            ['certification_status', 'certification_status', 'Certification Status', 'حالة شهادة']
        ],

        'CourseTracking' => [
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['course', 'دورة', 'Course', 'دورة'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['completion_date', 'الانتهاء', 'Completion Date', 'تاريخ الانتهاء'],
            ['progress_percentage', 'Progress_percentage', 'Progress Percentage', 'نسبة التقدم']
        ],

     ];

        foreach ($columns as $model => $fields) {
            $exists = DB::table('column_trainings')->where('model', $model)->exists();
            if ($exists) {
                continue;
            }

            foreach ($fields as $field) {
                DB::table('column_trainings')->insert([
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
