<?php

namespace Modules\Training\Database\Seeders;

use Illuminate\Database\Seeder;

class TrainingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(FieldTrainingManagement\FieldTrainingManagementSeeder::class);
        $this->call(AIDrivenLearningRecommendation\AIDrivenLearningRecommendationSeeder::class);
        $this->call(GamificationForTraining\GamificationForTrainingSeeder::class);
        $this->call(LicensingAndCertificationManagement\LicensingAndCertificationManagementSeeder::class);
        $this->call(TrainingNeedsAssessment\TrainingNeedsAssessmentSeeder::class);
        $this->call(ELearningManagement\ELearningManagementSeeder::class);
        $this->call(InternalTrainingManagement\InternalTrainingManagementSeeder::class);
        $this->call(ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationSeeder::class);
        $this->call(TrainingEvaluation\TrainingEvaluationSeeder::class);
        $this->call(CertificationManagement\CertificationManagementSeeder::class);
        $this->call(CourseTracking\CourseTrackingSeeder::class);
        $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
        ]);
    }
}
