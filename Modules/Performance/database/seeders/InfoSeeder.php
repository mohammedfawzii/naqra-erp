<?php

namespace Modules\Performance\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\InfoPerformance;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records =[
            [
                'infoable_type' => 'LearningManagementIntegration',
                'title' => ['en' => 'Learningmanagementintegration', 'ar' => 'تكامل إدارة التعلم'],
                'desc'  => ['en' => 'Description for Learningmanagementintegration', 'ar' => 'وصف لتكامل إدارة التعلم'],
            ],            [
                'infoable_type' => 'AiDrivenPerformanceInsight',
                'title' => ['en' => 'Aidrivenperformanceinsight', 'ar' => 'AI مدفوعة الأداء البصيرة'],
                'desc'  => ['en' => 'Description for Aidrivenperformanceinsight', 'ar' => 'وصف لعلم الذكاء الاصطناعى نظرة ثاقبة الأداء'],
            ],            [
                'infoable_type' => 'EmployeeRecognitionManagement',
                'title' => ['en' => 'Employeerecognitionmanagement', 'ar' => 'إدارة التعرف على الموظفين'],
                'desc'  => ['en' => 'Description for Employeerecognitionmanagement', 'ar' => 'وصف لإدارة التعرف على الموظفين'],
            ],            [
                'infoable_type' => 'ContinuousPerformanceManagement',
                'title' => ['en' => 'Continuousperformancemanagement', 'ar' => 'إدارة الأداء المستمر'],
                'desc'  => ['en' => 'Description for Continuousperformancemanagement', 'ar' => 'وصف لإدارة الأداء المستمر'],
            ],            [
                'infoable_type' => 'CompetencyManagement',
                'title' => ['en' => 'Competencymanagement', 'ar' => 'إدارة الكفاءة'],
                'desc'  => ['en' => 'Description for Competencymanagement', 'ar' => 'وصف لإدارة الكفاءة'],
            ],            [
                'infoable_type' => 'SuccessionPlanning',
                'title' => ['en' => 'Successionplanning', 'ar' => 'تخطيط الخلافة'],
                'desc'  => ['en' => 'Description for Successionplanning', 'ar' => 'وصف لتخطيط الخلافة'],
            ],            [
                'infoable_type' => 'PromotionReward',
                'title' => ['en' => 'Promotionreward', 'ar' => 'مكافأة الترويج'],
                'desc'  => ['en' => 'Description for Promotionreward', 'ar' => 'وصف مكافأة الترويج'],
            ],            [
                'infoable_type' => 'Feedback360',
                'title' => ['en' => 'Feedback360', 'ar' => 'ردود الفعل 360'],
                'desc'  => ['en' => 'Description for Feedback360', 'ar' => 'وصف للتعليقات 360'],
            ],            [
                'infoable_type' => 'DevelopmentPlan',
                'title' => ['en' => 'Developmentplan', 'ar' => 'خطة التنمية'],
                'desc'  => ['en' => 'Description for Developmentplan', 'ar' => 'وصف خطة التنمية'],
            ],            [
                'infoable_type' => 'Feedback',
                'title' => ['en' => 'Feedback', 'ar' => 'تعليق'],
                'desc'  => ['en' => 'Description for Feedback', 'ar' => 'وصف للتعليقات'],
            ],            [
                'infoable_type' => 'Evaluation',
                'title' => ['en' => 'Evaluation', 'ar' => 'تقييم'],
                'desc'  => ['en' => 'Description for Evaluation', 'ar' => 'وصف للتقييم'],
            ],            [
                'infoable_type' => 'Goal',
                'title' => ['en' => 'Goal', 'ar' => 'هدف'],
                'desc'  => ['en' => 'Description for Goal', 'ar' => 'وصف للهدف'],
            ],                [
                'infoable_type' => 'goals',
                'title' => ['en' => 'goals', 'ar' => 'goals'],
                'desc'  => ['en' => 'Description for goals', 'ar' => 'وصف goals للكشوف المرتبات'],
            ],
        ];

        foreach ($records as $record) {
            InfoPerformance::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
