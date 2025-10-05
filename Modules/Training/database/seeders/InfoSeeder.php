<?php

namespace Modules\Training\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\InfoPerformance;
use Modules\Training\Models\InfoTraining;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records =[
            [
                'infoable_type' => 'FieldTrainingManagement',
                'title' => ['en' => 'Fieldtrainingmanagement', 'ar' => 'FieldTrainingManagement'],
                'desc'  => ['en' => 'Description for Fieldtrainingmanagement', 'ar' => 'الوصف لإدارة FieldTraining'],
            ],            [
                'infoable_type' => 'AIDrivenLearningRecommendation',
                'title' => ['en' => 'Aidrivenlearningrecommendation', 'ar' => 'توصية تعليمية مدفوعة من الذكاء الاصطناعي'],
                'desc'  => ['en' => 'Description for Aidrivenlearningrecommendation', 'ar' => 'وصف لتوصية التعلم التي تحركها الذكاء الاصطناعي'],
            ],            [
                'infoable_type' => 'GamificationForTraining',
                'title' => ['en' => 'Gamificationfortraining', 'ar' => 'gamification للتدريب'],
                'desc'  => ['en' => 'Description for Gamificationfortraining', 'ar' => 'وصف للتشجيع للتدريب'],
            ],            [
                'infoable_type' => 'LicensingAndCertificationManagement',
                'title' => ['en' => 'Licensingandcertificationmanagement', 'ar' => 'إدارة الترخيص وإدارة الشهادات'],
                'desc'  => ['en' => 'Description for Licensingandcertificationmanagement', 'ar' => 'وصف للترخيص وإدارة الشهادات'],
            ],            [
                'infoable_type' => 'TrainingNeedsAssessment',
                'title' => ['en' => 'Trainingneedsassessment', 'ar' => 'تقييم احتياجات التدريب'],
                'desc'  => ['en' => 'Description for Trainingneedsassessment', 'ar' => 'وصف لتقييم احتياجات التدريب'],
            ],            [
                'infoable_type' => 'ELearningManagement',
                'title' => ['en' => 'Elearningmanagement', 'ar' => 'إدارة التعليم الإلكتروني'],
                'desc'  => ['en' => 'Description for Elearningmanagement', 'ar' => 'وصف الإيرلال'],
            ],            [
                'infoable_type' => 'InternalTrainingManagement',
                'title' => ['en' => 'Internaltrainingmanagement', 'ar' => 'الإدارة الداخلية'],
                'desc'  => ['en' => 'Description for Internaltrainingmanagement', 'ar' => 'وصف لإدارة التدريب الداخلية'],
            ],            [
                'infoable_type' => 'ExternalLearningPlatformIntegration',
                'title' => ['en' => 'Externallearningplatformintegration', 'ar' => 'externallearningplatformintemration'],
                'desc'  => ['en' => 'Description for Externallearningplatformintegration', 'ar' => 'وصف لتكامل منصة التعلم الخارجي'],
            ],            [
                'infoable_type' => 'TrainingEvaluation',
                'title' => ['en' => 'Trainingevaluation', 'ar' => 'تقييم التدريب'],
                'desc'  => ['en' => 'Description for Trainingevaluation', 'ar' => 'وصف لتقييم التدريب'],
            ],            [
                'infoable_type' => 'CertificationManagement',
                'title' => ['en' => 'Certificationmanagement', 'ar' => 'إدارة الشهادات'],
                'desc'  => ['en' => 'Description for Certificationmanagement', 'ar' => 'وصف لإدارة الشهادات'],
            ],            [
                'infoable_type' => 'CourseTracking',
                'title' => ['en' => 'Coursetracking', 'ar' => 'coursetracking'],
                'desc'  => ['en' => 'Description for Coursetracking', 'ar' => 'وصف CoursetRacking'],
            ],
        ];

        foreach ($records as $record) {
            InfoTraining::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}
